<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Imagine\Image\Box;

class FileUpload extends Controller
{
    public function index()
    {
        $imgs = Image::paginate(15);
        return view('admin.imgs.index', compact('imgs'));
    }
    public function createForm()
    {
        return view('admin.imgs.image-upload');
    }

    public function fileUpload(Request $req){
        $req->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        //dd($req);

        if($req->hasfile('imageFile')) {
            foreach($req->file('imageFile') as $file)
            {
                $name = md5(time()."-{$file->getClientOriginalName()}").".{$file->guessExtension()}";
                $file->move(public_path().'/uploads/', $name);

                $fileModal = new Image();
                $fileModal->name = $name;
                $fileModal->image_path = '/uploads/'.$name;
                $fileModal->using = $req['using'];
                $fileModal->title = $req['title'];
                $fileModal->legenda = $req['legenda'];

                $fileModal->save();

                $thumbSmall = \Imagem::open($fileModal->image_path)->thumbnail(new Box(60, 60));
                \Storage::disk('public')->put($name, $thumbSmall);

            }

            return back()->with('success', 'Arquivos salvos com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Image $img)
    {
        return view('admin.imgs.show', compact('img'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Image $img
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Image $img)
    {
        if(\Storage::disk('public')->exists($img->name)){

            \Storage::disk('public')->delete($img->name);
        }

        if(\File::exists(public_path().'/uploads/'.$img->name)){
            \File::delete(public_path().'/uploads/'.$img->name);
        }

        $img->delete();
        $request->session()->flash('msg', 'Imagem deletada com sucesso!');
        return redirect()->route('admin.imgs.index');

    }
}
