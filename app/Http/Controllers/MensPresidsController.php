<?php

namespace App\Http\Controllers;

use App\Models\DiretoriaUser;
use App\Models\MensPresid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MensPresidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menspres = MensPresid::with('user')->paginate(15);

        return view('admin.menspres.index', compact('menspres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menspres.create');
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
        $valid = Validator::make($data, [
            'tema' => ['required', 'string', 'min:10', 'max:255'],
            'introd' => ['required', 'max:1000'],
            'texto' => ['required', 'min:500'],
            'publica' => ['required'],
            'ativa' => ['required']
            ],
        [
            'tema.required' => 'O campo Tema abordado é obrigatório. Defina o tema da mensagem.',
            'tema.max' => 'O campo Tema abordado tem que ter no máximo 255 toques.',
            'introd.required' => 'O campo introdução é obrigatório.',
            'introd.max' => 'O campo introdução deve ter no máximo 1000 caracteres.',
            'texto.required' => 'O campo texto é obrigatório.',
            'texto.min' => 'O campo texto tem que ter no mínimo 500 caracteres.',
            'publica.required' => 'Maque se a mensagem será publicada ou não!',
            'ativa' => 'A mensagem precisa estar ativa para publicar!',
        ]);

        if(!$valid->validate()){
            return redirect()->back()
                ->withErrors($valid->getMessageBag())
                ->withInput();
        }

        //regra temporária para testes comentar em produção
        $data['user_id'] = 26;
        //dd($data);
        MensPresid::create($data);
        $request->session()->flash('msg', 'Mensagem criada com sucesso');
        return redirect()->route('admin.menspres.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MensPresid  $menspre
     * @return \Illuminate\Http\Response
     */
    public function show(MensPresid $menspre)
    {
        return view('admin.menspres.show', compact('menspre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $menspre = MensPresid::find($id);
        //dd($menspres);
        return view('admin.menspres.edit', compact('menspre'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MensPresid  $mensPresid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MensPresid $mensPresid)
    {
        $data = $request->all();
        $mensPresid = MensPresid::find($data['id']);
        $mensPresid->fill($data);
        $mensPresid->save();

        $request->session()->flash('msg', 'Mensagem atualizada!');
        return redirect()->route('admin.menspres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MensPresid  $menspre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MensPresid $menspre)
    {
        $menspre->delete();
        $request->session()->flash('msg', 'Mensagem deletada com sucesso');
        return redirect()->route('admin.menspres.index');
    }
}
