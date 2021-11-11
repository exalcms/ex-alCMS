<?php

namespace App\Http\Controllers;

use App\Forms\DiretoriaUserForm;
use App\Forms\RelPhotoDiretForm;
use App\Models\DiretoriaUser;
use Illuminate\Http\Request;

class DiretoriaUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compos = DiretoriaUser::with(['user', 'diretoria'])->where('ativo', '=', 's')->get();
        return view('admin.compos.index', compact('compos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(DiretoriaUserForm::class, [
            'url' => route('admin.compos.store'),
            'method' => 'POST',
        ]);

        return view('admin.compos.create', compact('form'));
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
        //dd($data);
        DiretoriaUser::create($data);
        $request->session()->flash('msg', 'Registro salvo com sucesso!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiretoriaUser  $diretoriaUser
     * @return \Illuminate\Http\Response
     */
    public function show(DiretoriaUser $diretoriaUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiretoriaUser  $compo
     * @return \Illuminate\Http\Response
     */
    public function edit(DiretoriaUser $compo)
    {
        $form = \FormBuilder::create(DiretoriaUserForm::class, [
            'url' => route('admin.compos.update', ['compo' => $compo->id]),
            'method' => 'PUT',
            'model' => $compo,
            'data' => ['id' => $compo->id],
        ]);

        return view('admin.compos.edit', compact('form'));
    }

    public function photorel(DiretoriaUser $compo)
    {
        $form = \FormBuilder::create(RelPhotoDiretForm::class, [
            'url' => route('admin.compos.update', ['compo' => $compo->id]),
            'method' => 'PUT',
            'model' => $compo,
            'data' => ['id' => $compo->id],
        ]);

        return view('admin.compos.photo-rel', compact('form', 'compo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DiretoriaUser  $compo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiretoriaUser $compo)
    {
        $data = $request->all();
        if(key_exists('photo_id', $data)){
            $data['foto'] = true;
        }

        $compo->fill($data);
        $compo->save();
        if(key_exists('photo_id', $data)){
            $request->session()->flash('msg', 'Foto anexada com sucesso');
        }else{
            $request->session()->flash('msg', 'Registro atualizado com sucesso');
        }
        return redirect()->route('admin.compos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiretoriaUser  $diretoriaUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiretoriaUser $diretoriaUser)
    {
        //
    }
}
