<?php

namespace App\Http\Controllers;

use App\Forms\MensagemsForm;
use App\Mail\SendMailUser;
use App\Models\Association;
use App\Models\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Symfony\Component\HttpFoundation\Response;

class MensagemsControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mensagems = Mensagem::orderBy('updated_at', 'ASC')->paginate(10);
        return view('admin.mensagems.index', compact('mensagems') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exCMS = Association::orderBy('id', 'DESC')->first();
        return view('mensagem', compact('exCMS'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'nome' => ['required', 'string', 'max:255', 'min:4'],
            'tele' => ['required', 'min:11'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'mensagem' => ['required'],
            ],
        [
            'nome.min' => 'Favor digitar um nome válido',
            'nome.required' => 'Favor digitar seu nome',
            'tele.min' => 'Digite o telefone no formato (ddd)xxxxxxxxx',
            'tele.required' => 'Digite seu telefone com o ddd',
            'email.email' => 'Informe um email válido',
            'subject.max' => 'O campo Assunto é limitado a 230 caracteres',
        ])->validate();
        if ($data['user_id'] != null){
            $data['cadastrado'] = 's';
        }
        //dd($data);
        $msg = Mensagem::create($data);

        $emailTo = $data['email'];
        $nome = $data['nome'];
        $date = now();

        $messagem  = "Olá $nome,";
        $messagem .= "<br/><br/>";
        $messagem .= "Nós recebemos sua mensagem e será encaminhada para, caso seja necessário respondermos";
        $messagem .= "<br/><br/>";
        $messagem .= "Obrigado por nos contactar. <br/>";
        $messagem .= "Esta é uma mensagem automática, por favor não responda este email!";
        $messagem .= "<br/><br/>";
        $messagem .= "Caso tenha mais alguma dúvida, pode nos contatar novamente através do nosso formulário no site</br>";

        $mailData = [
            'title' => 'Recebemos a sua mensagem',
            'sub-title' => $data['subject'],
            'mensagem' => $messagem,
            'url' => null,
            'title-button' => null,
            'date' => $date,
        ];

        Mail::to($emailTo)->send(new SendMailUser($mailData));

        if(!Response::HTTP_OK){
            $msg->delete();
        }

        $request->session()->flash('msg', 'Mensagem enviada com sucesso!');
        return redirect()->route('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show(Mensagem $mensagem)
    {
        return view('admin.mensagems.show', compact('mensagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensagem $mensagem)
    {
        $form = FormBuilder::create(MensagemsForm::class, [
            'url' => route('admin.sendEmail', ['mensagem' => $mensagem->id]),
            'method' => 'POST',
            'model' => $mensagem,
            'data' => ['id' => $mensagem->id],
        ]);

        return view('admin.mensagems.edit', compact('form'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensagem  $mensagem
     */
    public function sendEmail(Request $request, Mensagem $mensagem)
    {
        $data = $request->all();
        Validator::make($data, [
            'nome' => ['required', 'string', 'max:255', 'min:4'],
            'tele' => ['required', 'min:11'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'mensagem' => ['required'],
            'resposta' => ['required']
        ],
            [
                'nome.min' => 'Favor digitar um nome válido',
                'nome.required' => 'Favor digitar seu nome',
                'tele.min' => 'Digite o telefone no formato (ddd)xxxxxxxxx',
                'tele.required' => 'Digite seu telefone com o ddd',
                'email.email' => 'Informe um email válido',
                'subject.max' => 'O campo Assunto é limitado a 230 caracteres',
            ])->validate();

        $emailTo = $data['email'];
        $nome = $data['nome'];
        $texto = $data['resposta'];
        $date = now();
        $autor = $data['resp_autor'];

        $messagem  = "Olá $nome,";
        $messagem .= "<br/><br/>";
        $messagem .= $texto;
        $messagem .= "<br/><br/>";
        $messagem .= "Obrigado por nos contactar. <br/>";
        $messagem .= "Esperamos ter atendido a sua expectativa!";
        $messagem .= "<br/><br/>";
        $messagem .= "Caso tenha mais alguma dúvida, pode nos contatar novamente através do nosso formulário no site</br>";

        $mailData = [
            'title' => 'Retorno ao seu contato',
            'sub-title' => $data['subject'],
            'mensagem' => $messagem,
            'url' => null,
            'title-button' => null,
            'date' => $date,
        ];

        Mail::to($emailTo)->send(new SendMailUser($mailData));

        if(Response::HTTP_OK){
            $msg = 'Mensagem enviada com sucesso';
        }else{
            $msg = 'Ops! Tivemos problema. Tente novamente mais tarde!';
        }

        $dados = [
            'status' => 'resp',
            'resposta' => $texto,
            'resp_data' => $date,
            'resp_autor' =>$autor,
        ];

        \DB::table('mensagems')->where('id', $mensagem->id )->update($dados);

        $request->session()->flash('msg', $msg);
        return redirect()->route('admin.mensagems.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensagem $mensagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Mensagem $mensagem)
    {
        $mensagem->delete();
        $request->session()->flash('msg', 'Mensagem apagada com sucesso');
        return redirect()->route('admin.mensagems.index');
    }
}
