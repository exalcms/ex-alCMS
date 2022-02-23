<?php

namespace App\Http\Controllers;

use App\Forms\GaleryForm;
use App\Forms\RelPhotoProductForm;
use App\Models\Galery;
use App\Models\Photo;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeries = Galery::with('photos')
            ->orderBy('id', 'DESC')
            ->paginate(8);
        return view('admin.galeries.index', compact('galeries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(GaleryForm::class, [
            'url' => route('admin.galeries.store'),
            'method' => 'POST'
        ]);
        return view('admin.galeries.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(GaleryForm::class);
        $data = $form->getFieldValues();

        \Validator::make($data, [
            'titulo' => ['required', 'string', 'max:255'],
            'tipo' => ['required'],
            'data' => ['required'],
        ],
        [
            'tipo.required' => 'Selecione um tipo válido para a Galeria!',
            'titulo.max' => 'Tamanho máximo do título com 255 toques!',
            'data.required' => 'A data do evento precisa ser informada',
        ])->validate();
        //dd($data);
        Galery::create($data);
        $request->session()
            ->flash('msg', 'Galeria criada com sucesso. Agora faça o upload das fotos');
        return redirect()->route('admin.galeries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Galery $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $galery)
    {
        return view('admin.galeries.show', compact('galery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galery $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $galery)
    {
        $form = \FormBuilder::create(GaleryForm::class, [
            'url' => route('admin.galeries.update', [ 'galery' => $galery->id]),
            'method' => 'PUT',
            'model' => $galery,
            'data' => ['id' => $galery->id],
        ]);

        return view('admin.galeries.edit', compact('form'));
    }

    public function photorel(Galery $galery)
    {
        $form = \FormBuilder::create(RelPhotoProductForm::class, [
            'url' => route('admin.galeries.update', ['galery' => $galery->id]),
            'method' => 'PUT',
            'model' => $galery,
            'data' => ['id' => $galery->id],
        ]);
        return view('admin.galeries.photo-rel', compact('form', 'galery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $galery)
    {
        $data = $request->all();
        if (key_exists('photo_id', $data)){
            $photos = Photo::whereIn('id', $data['photo_id'])->get();
            $galery->photos()->sync($photos);
        }

        $galery->fill($data);
        $galery->save();
        if(key_exists('photo_id', $data)){
            $request->session()->flash('msg', 'Foto anexada com sucesso');
        }else{
            $request->session()->flash('msg', 'Registro atualizado com sucesso');
        }
        return redirect()->route('admin.galeries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Galery $galery)
    {
        //
    }
}
