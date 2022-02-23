<?php

namespace App\Http\Controllers;

use App\Forms\CupomForm;
use App\Models\Cupom;
use App\Models\Order;
use Illuminate\Http\Request;

class CupomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupoms = Cupom::paginate();
        return view('admin.cupoms.index', compact('cupoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(CupomForm::class, [
            'url' => route('admin.cupoms.store'),
            'method' => 'POST',
        ]);
        return view('admin.cupoms.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(CupomForm::class);
        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $data['code'] = \Auth::user()->id."_".uniqid(rand(100, 1000), true);
        Cupom::create($data);
        $request->session()->flash('msg', 'Cupom de Desconto criado com sucesso!');
        return redirect()->route('admin.cupoms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Cupom $cupom
     * @return \Illuminate\Http\Response
     */
    public function show(Cupom $cupom)
    {
        $count = Order::where(['cupom_id' => $cupom->id])->count();
        return view('admin.cupoms.show', compact('cupom', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cupom $cupom
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupom $cupom)
    {
        $form = \FormBuilder::create(CupomForm::class, [
            'url' => route('admin.cupoms.update', ['cupom' => $cupom->id]),
            'method' => 'PUT',
            'model' => $cupom,
        ]);

        return view('admin.cupoms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cupom $cupom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupom $cupom)
    {
        $form = \FormBuilder::create(CupomForm::class);
        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $cupom->fill($data);
        $cupom->save();
        $request->session()->flash('msg', 'Dados Atualizados com sucesso');
        return redirect()->route('admin.cupoms.index');
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
