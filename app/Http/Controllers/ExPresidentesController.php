<?php

namespace App\Http\Controllers;

use App\Forms\ExPresidenteForm;
use App\Forms\RelPhotoExPresForm;
use App\Models\ExPresidente;
use App\Models\Imagem;
use Illuminate\Http\Request;

class ExPresidentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expresids = ExPresidente::with('user', 'photo')->paginate();
        //dd($expresids);
        return view('admin.expresids.index', compact('expresids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(ExPresidenteForm::class, [
            'url' => route('admin.expresids.store'),
            'method' => 'POST'
        ]);

        return view('admin.expresids.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(ExPresidenteForm::class);
        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        ExPresidente::create($data);
        $request->session()->flash('msg', 'Ex-Presidente cadastrado com sucesso!');
        return redirect()->route('admin.expresids.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExPresidente  $expresid
     * @return \Illuminate\Http\Response
     */
    public function show(ExPresidente $expresid)
    {
        return view('admin.expresids.show', compact('expresid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExPresidente  $expresid
     * @return \Illuminate\Http\Response
     */
    public function edit(ExPresidente $expresid)
    {

        $form = \FormBuilder::create(ExPresidenteForm::class, [
            'url' => route('admin.expresids.update', ['expresid' => $expresid->id]),
            'method' => 'PUT',
            'model' => $expresid,
            'data' => ['id' => $expresid->id],
        ]);

        return view('admin.expresids.edit', compact('form'));
    }

    public function photorel(ExPresidente $expresid)
    {
        $form = \FormBuilder::create(RelPhotoExPresForm::class, [
            'url' => route('admin.expresids.update', ['expresid' => $expresid->id]),
            'method' => 'PUT',
            'model' => $expresid,
            'data' => ['id' => $expresid->id],
        ]);

        return view('admin.expresids.photo-rel', compact('form', 'expresid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExPresidente  $expresid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExPresidente $expresid)
    {
        $data = $request->all();
        if(key_exists('photo_id', $data)){
            $data['foto'] = true;
        }

        $expresid->fill($data);
        $expresid->save();
        if(key_exists('photo_id', $data)){
            $request->session()->flash('msg', 'Foto anexada com sucesso');
        }else{
            $request->session()->flash('msg', 'Registro atualizado com sucesso');
        }
        return redirect()->route('admin.expresids.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExPresidente  $expresid
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExPresidente $expresid)
    {
        //
    }
}
