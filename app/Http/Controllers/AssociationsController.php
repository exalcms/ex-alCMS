<?php

namespace App\Http\Controllers;

use App\Forms\AssocForm;
use App\Models\Association;
use Illuminate\Http\Request;

class AssociationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assocs = Association::all();

        return view('admin.assoc.index', compact('assocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(AssocForm::class, [
            'url' => route('admin.assoc.store'),
            'method' => 'POST'
        ]);

        return view('admin.assoc.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(AssocForm::class);
        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        //dd($data);
        Association::create($data);
        $request->session()->flash('msg', 'Dados da Associação inseridos corretamente!');
        return redirect()->route('admin.assoc.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Association $assoc)
    {
        return view('admin.assoc.show', compact('assoc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Association $assoc)
    {
        $form = \FormBuilder::create(AssocForm::class, [
            'url' => route('admin.assoc.update', ['assoc' => $assoc->id]),
            'method' => 'PUT',
            'model' => $assoc
        ]);

        return view('admin.assoc.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Association $assoc)
    {
        $form = \FormBuilder::create(AssocForm::class,[
            'data' => ['id' => $assoc->id]
        ]);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();

        $assoc->fill($data);
        $assoc->save();
        $request->session()->flash('msg', 'Dados Atualizados com sucesso');
        return redirect()->route('admin.assoc.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Association $assoc)
    {
        $assoc->delete();
        $request->session()->flash('msg', 'Registro deletado com sucesso');
        return redirect()->route('admin.assoc.index');
    }
}
