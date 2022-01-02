<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Imagine\Image\Box;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('using', 'ASC')->paginate(8);
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
            'photoFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf'
        ]);
        //|max:2048
        if($request->hasfile('photoFile')){
            foreach ($request->file('photoFile') as $file)
            {

                if ($file->getSize() > 2048){
                    $width = 800;
                    $heigth = 600;

                    list($width_oring, $heigth_orig) = getimagesize($file);
                    $ratio_orig = $width_oring/$heigth_orig;

                    if($width/$heigth > $ratio_orig){
                        $width = $heigth*$ratio_orig;
                    }else{
                        $heigth = $width/$ratio_orig;
                    }

                    $img = Image::make($file);
                    $img->resize($width, $heigth);
                    if ($request['using'] == 'Galeria'){
                        $img->insert(public_path().'/site/img/marca_15.png', 'bottom-right', 10, 10);
                    }
                    $img->save($file);
                }

                $name = md5("-{$file->getClientOriginalName()}")."_".time().".{$file->guessExtension()}";
                $pasta = \App\Utils\DefaultFunctions::tirarAcentos($request['title']);
                $file->move(public_path() . '/uploads/'.$pasta, $name);

                $photoModel = new Photo();
                $photoModel->name = $name;
                $photoModel->photo_path = '/uploads/'.$pasta.'/'.$name;
                $photoModel->origin_name = $file->getClientOriginalName();
                $photoModel->using = $request['using'];
                $photoModel->title = $request['title'];
                $photoModel->legenda = $request['legenda'];

                $photoModel->save();

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

        if(\File::exists(public_path().$photo->photo_path)){
            \File::delete(public_path().$photo->photo_path);
        }

        $photo->delete();
        $request->session()->flash('msg', 'Foto deletada com sucesso');
        return redirect()->route('admin.photos.index');
    }
}
