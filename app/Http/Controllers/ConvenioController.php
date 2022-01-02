<?php

namespace App\Http\Controllers;

use App\Forms\ConvenioForm;
use App\Forms\RelPhotoConvenioForm;
use App\Models\Convenio;
use App\Models\Photo;
use DB;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convenios = Convenio::with('photos')->where('ativo', '=', 's')->paginate(8);
        return view('admin.convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(ConvenioForm::class, [
            'url' => route('admin.convenios.store'),
            'method' => 'POST',
        ]);

        return view('admin.convenios.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(ConvenioForm::class);
        $data = $form->getFieldValues();
        $hoje = now();
        $hoje = $hoje->format('Y-m-d');

        \Validator::make($data, [
            'empresa' => ['required', 'string', 'max:255'],
            'end' => ['required', 'string', 'max:255'],
            'tele' => ['required', 'max:15', 'min:14'],
            'email' => ['required', 'email'],
            'objeto' => ['required', 'string', 'max:255'],
            'beneficios' => ['required'],
            'condicions' => ['required'],
            'data_valid' => ['required'],
            'validade' =>[$hoje >= $data['data_valid'] ? 'required' : null],
            'ativo' => ['required'],
        ],
            [
                'empresa.required' => 'O campo Nome do Parceiro precisa ser preenchido',
                'empresa.string' => 'O campo Nome do Parceiro precisa ser válido',
                'empresa.max:255' => 'O campo Nome do Parceiro não deve exceder o tamanho máximo de 255 toques',
                'end.required' => 'O campo Endereço do Estabelecimento precisa ser preenchido',
                'end.string' => 'O campo Endereço do Estabelecimento precisa ser válido',
                'end.max' => 'O campo Endereço do Estabelecimento não deve exceder o tamanho máximo de 255 toques',
                'tele.requerido' => 'O campo Telefone precisa ser preenchido',
                'tele.max' => 'O campo Telefone tem que ter no máximo 15 caracteres digite no formato (dd) nnnn-nnnn',
                'tele.min' => 'O campo Telefone precisa ter no minimo 14 caracteres digite no formato (dd) nnnn-nnnn',
                'objeto.required' => 'O campo Objeto do Convênio precisa ser preenchido',
                'objeto.string' => 'O campo Objeto do Convênio precisa ser válido',
                'objeto.max' => 'O campo Objeto do Convênio não deve exceder o tamanho máximo de 255 toques',
                'beneficios.required' => 'O campo Benefícios precisa ser informado',
                'condicions.required' => 'O Campo Condições para acesso deve ser informado',
                'data_valid.required' => 'Informe a data de validade do convênio',
                'ativo.required' => 'Marque se o Convênio está ou não ativo',
                'validade.required' => 'A data de Validade do Convênio não pode ser nem anterior nem igual a data atual',

        ])->validate();
        //dd($data);
        Convenio::create($data);
        $request->session()->flash('msg', 'Convênio Cadastrado com sucesso');
        return redirect()->route('admin.convenios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Convenio $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio)
    {
        return view('admin.convenios.show', compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convenio $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        $form = \FormBuilder::create(ConvenioForm::class, [
            'url' => route('admin.convenios.update', ['convenio' => $convenio->id]),
            'method' => 'PUT',
            'model' => $convenio,
            'data' => ['id' => $convenio->id],
        ]);

        return view('admin.convenios.edit', compact('form'));
    }

    public function photorel(Convenio $convenio)
    {
        $form = \FormBuilder::create(RelPhotoConvenioForm::class, [
            'url' => route('admin.convenios.update', ['convenio' => $convenio->id]),
            'method' => 'PUT',
            'model' => $convenio,
            'data' => ['id' => $convenio->id],
        ]);

        return view('admin.convenios.photo-rel', compact('form', 'convenio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio)
    {
        $data = $request->all();

        if (key_exists('photo_id', $data)){
            $data['photo'] = true;
            $photos = Photo::whereIn('id', $data['photo_id'])->get();
            $convenio->photos()->attach($photos);
        }

        $convenio->fill($data);
        $convenio->save();
        if(key_exists('photo_id', $data)){
            $request->session()->flash('msg', 'Foto anexada com sucesso');
        }else{
            $request->session()->flash('msg', 'Registro atualizado com sucesso');
        }
        return redirect()->route('admin.convenios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Convenio $convenio)
    {
        $convenio->delete();
        $request->session()->flash('msg', 'Convênio deletado com sucesso');
        return redirect()->route('admin.convenios.index');

    }
}
