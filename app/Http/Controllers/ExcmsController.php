<?php

namespace App\Http\Controllers;

use App\Forms\ConsultForm;
use App\Models\Association;
use App\Models\Convenio;
use App\Models\Diretoria;
use App\Models\DiretoriaUser;
use App\Models\ElementSite;
use App\Models\ExPresidente;
use App\Models\MensPresid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExcmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dirPres = DiretoriaUser::with('user','diretoria', 'photo')->where('diretoria_id', '=', 1)->first();
        $dirVic = DiretoriaUser::with('user','diretoria', 'photo')->where('diretoria_id', '=', 2)->first();
        $dirSec = DiretoriaUser::with('user','diretoria', 'photo')->where('diretoria_id', '=', 3)->first();
        $dirFin = DiretoriaUser::with('user','diretoria', 'photo')->where('diretoria_id', '=', 4)->first();
        $dirJur = DiretoriaUser::with('user','diretoria', 'photo')->where('diretoria_id', '=', 5)->first();
        $dirCom = DiretoriaUser::with('user','diretoria', 'photo')->where('diretoria_id', '=', 6)->first();
        $dirCul = DiretoriaUser::with('user','diretoria', 'photo')->where('diretoria_id', '=', 7)->first();
        $dirEsp = DiretoriaUser::with('user','diretoria', 'photo')->where('diretoria_id', '=', 8)->first();
        $menspre = MensPresid::with('user')->where(['ativa' => 's', 'publica' => 's'])->first();
        $expresids = ExPresidente::with('photo','user')->where('publica', '=', 's')->orderBy('inicio', 'ASC')->get();
        $convenios = Convenio::with('photos')->where('ativo', '=', 's')->orderBy('data_valid', 'ASC')->get();
        $exCMS = Association::orderBy('id', 'DESC')->first();
        $assoc = ElementSite::orderBy('id', 'DESC')->first();
        return view('welcome', compact('assoc', 'dirFin', 'dirPres', 'dirSec', 'dirVic', 'dirJur',
            'dirCom', 'dirCul', 'dirEsp', 'menspre', 'expresids', 'exCMS', 'convenios'));
    }

    public function detail()
    {
        return view('detail');
    }

    public function detailConv(Convenio $convenio)
    {
        return view('detail-conv', compact('convenio'));
    }

    public function consultConv(Convenio $convenio)
    {
        $form = \FormBuilder::create(ConsultForm::class, [
            'url' => route('consult-cpf'),
            'method' => 'POST',
            'model' => $convenio,
            'data' => ['id' => $convenio->id],
        ]);

        return view('/consult', compact('form', 'convenio'));
    }

    public function consultCPF(Request $request)
    {
        $data = $request->all();
        //dd($data);
        Validator::make($data, [
            'cpf' => ['required', 'string', 'max:14', 'cpf'],
        ],
            [
                'cpf.cpf' => 'CPF inválido',
            ])->validate();
        $cpf = $data['cpf'];
        $exist = User::where('cpf', '=', $cpf)->count();
        if ($exist == 0){
            $request->session()->flash('msg', 'Este CPF não está cadastrado como associado');
            return redirect()->route('detail-conv', ['convenio' => $data['id']]);
        }else{
            $user = User::where([
                ['cpf', '=', $cpf],
                ['assoc_emdia', '=', 's'],
            ])->count();
            if ($user == 0){
                $request->session()->flash('msg', 'Este CPF não está habilitado para o convênio!');
                return redirect()->route('detail-conv', ['convenio' => $data['id']]);
            }else{
                $request->session()->flash('msg', 'O associado está habilitado para o convênio!');
                return redirect()->route('detail-conv', ['convenio' => $data['id']]);
            }
        }

    }

    public function history()
    {
        $history = ElementSite::orderBy('id', 'DESC')->first();
        return view('history', compact('history'));
    }

    public function messagePres()
    {
        $menspre = MensPresid::with('user')->where(['ativa' => 's', 'publica' => 's'])->first();
        return view('message-pres', compact('menspre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
