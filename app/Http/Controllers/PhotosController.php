<?php

namespace App\Http\Controllers;

use App\Forms\RelPhotoExPresForm;
use App\Models\Photo;
use Folklore\Image\Image;
use Illuminate\Http\Request;
use Imagine\Image\Box;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::paginate(15);
        return view('admin.photos.index', compact('photos'));
    }

    public function upload()
    {
        return view('admin.photos.photo-upload');
    }

    public function photoUpload(Request $request)
    {
        //dd($request);
        $request->validate([
            'photoFile' => 'required',
            'photoFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        if($request->hasfile('photoFile')){
            foreach ($request->file('photoFile') as $file)
            {
                $name = md5("-{$file->getClientOriginalName()}")."_".time().".{$file->guessExtension()}";
                $file->move(public_path().'/uploads', $name);

                $photoModel = new Photo();
                $photoModel->name = $name;
                $photoModel->photo_path = '/uploads/'.$name;
                $photoModel->origin_name = $file->getClientOriginalName();
                $photoModel->using = $request['using'];
                $photoModel->title = $request['title'];
                $photoModel->legenda = $request['legenda'];

                $photoModel->save();

                $thumbSmall = \Image::open($photoModel->photo_path)->thumbnail(new Box(60, 60));
                \Storage::disk('public')->put($name, $thumbSmall);
            }

            return back()->with('msg', 'Fotos salvas com sucesso');
        }else{
            return back()->with('msg', 'Nenhum arquivo foi selecionado');
        }
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
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $form = \FormBuilder::create(RelImagUserForm::class, [
            'url' => route('admin.photos.update', ['photo' => $photo->id]),
            'method' => 'PUT',
            'model' => $photo,
            'data' => ['id' => $photo->id],
        ]);

        return view('admin.photos.create-rel', compact('form', 'photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Photo $photo)
    {
        if(\Storage::disk('public')->exists($photo->name)){
            \Storage::disk('public')->delete($photo->name);
        }

        if(\File::exists(public_path().'/uploads/'.$photo->name)){
            \File::delete(public_path().'/uploads/'.$photo->name);
        }

        $photo->delete();
        $request->session()->flash('msg', 'Foto deletada com sucesso');
        return redirect()->route('admin.photos.index');
    }
}
