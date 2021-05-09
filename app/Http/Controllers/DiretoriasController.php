<?php

namespace App\Http\Controllers;

use App\Forms\DiretoriaForm;
use App\Models\Diretoria;
use Illuminate\Http\Request;

class DiretoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direts = Diretoria::all();
        return view('admin.diret.index', compact('direts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(DiretoriaForm::class, [
            'url' => route('admin.diret.store'),
            'method' => 'POST',
        ]);
        return view('admin.diret.create', compact('form'));
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

        Diretoria::create($data);
        $request->session()->flash('msg', 'Registro salvo com sucesso!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diretoria  $diret
     * @return \Illuminate\Http\Response
     */
    public function show(Diretoria $diret)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diretoria  $diret
     * @return \Illuminate\Http\Response
     */
    public function edit(Diretoria $diret)
    {
        $form = \FormBuilder::create(DiretoriaForm::class, [
            'url' => route('admin.diret.update', ['diret' => $diret->id]),
            'method' => 'PUT',
            'model' => $diret,
            'data' => ['id' => $diret->id],
        ]);

        return view('admin.diret.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diretoria  $diret
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diretoria $diret)
    {
        $form = \FormBuilder::create(DiretoriaForm::class);
        $data = array_filter($form->getFieldValues());
        $diret->fill($data);
        $diret->save();

        $request->session()->flash('msg', 'Cargo atualizado com sucesso!');
        return redirect()->route('admin.diret.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diretoria  $diretoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diretoria $diretoria)
    {
        //
    }
}
