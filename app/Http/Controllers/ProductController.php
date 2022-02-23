<?php

namespace App\Http\Controllers;

use App\Forms\ProductForm;
use App\Forms\RelPhotoProductForm;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('photos')
        ->orderBy('name', 'ASC')->paginate(8);
        return  view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(ProductForm::class, [
            'url' => route('admin.products.store'),
            'method' => 'POST'
        ]);

        return view('admin.products.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(ProductForm::class);
        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $data['price'] = preg_replace('#\D#', '', $data['price'])/100;
        Product::create($data);
        $request->session()->flash('msg', 'Produto salvo com sucesso!');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $form = \FormBuilder::create(ProductForm::class, [
            'url' => route('admin.products.update', [ 'product' => $product->id]),
            'method' => 'PUT',
            'model' => $product
        ]);

        return view('admin.products.edit', compact('form'));
    }

    public function photorel(Product $product)
    {
        $form = \FormBuilder::create(RelPhotoProductForm::class, [
            'url' => route('admin.products.update', ['product' => $product->id]),
            'method' => 'PUT',
            'model' => $product,
            'data' => ['id' => $product->id],
        ]);

        return view('admin.products.photo-rel', compact('form', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        //dd($data);
        if (key_exists('photo_id', $data)){
            $photos = Photo::whereIn('id', $data['photo_id'])->get();
            $product->photos()->sync($photos);
        }
        if(key_exists('price', $data)){
            $data['price'] = preg_replace('#\D#', '', $data['price'])/100;
            $product->fill($data);
            $product->save();
        }

        if(key_exists('photo_id', $data)){
            $request->session()->flash('msg', 'Foto anexada com sucesso');
        }else{
            $request->session()->flash('msg', 'Dados atualizados com sucesso');
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        dd($product);
        $product->delete();
        $request->session()->flash('msg', 'Registro deletado com sucesso');
        return redirect()->route('admin.products.index');
    }
}
