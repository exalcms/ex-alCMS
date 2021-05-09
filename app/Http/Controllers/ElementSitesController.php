<?php

namespace App\Http\Controllers;

use App\Models\ElementSite;
use Illuminate\Http\Request;

class ElementSitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elems = ElementSite::paginate(15);
        return view('admin.elems.index', compact('elems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.elems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ElementSite::create($request->all());
        $request->session()->flash('msg', 'Conteúdo salvo corretamente!');
        return redirect()->route('admin.elems.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  ElementSite $elem
     * @return \Illuminate\Http\Response
     */
    public function show(ElementSite $elem)
    {
        return view('admin.elems.show', compact('elem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ElementSite $elem
     * @return \Illuminate\Http\Response
     */
    public function edit(ElementSite $elem)
    {
        return view('admin.elems.ele.edit', compact('elem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ElementSite $elem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function atualiz(Request $request)
    {

        $data = $request->all();
        $elem = ElementSite::find($data['idelem']);
        $elem->fill($data);
        $elem->save();
        //dd($elem);
        $request->session()->flash('msg', 'Conteúdo atualizado com sucesso!');

        return redirect()->route('admin.elems.index');
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
