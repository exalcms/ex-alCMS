@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Lista de categorias cadastradas</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Novo')->asLinkTo(route('admin.products.create')) !!}
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.products.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($products)->striped()
                                    ->callback('Detalhes', function ($field, $product){
                                        $photCount = count($product->photos);
                                        if($photCount == 0){
                                           $img = \App\Models\Photo::where('origin_name', '=', 'dir_sem_foto.jpg')->first();
                                            $foto = $img->photo_path;
                                        }else{
                                            foreach ($product->photos as $photo){
                                                $foto = $photo->photo_path;
                                                break;
                                            }
                                        }

                                        return MediaObject::withContents([
                                            'image' => asset($foto),
                                            'link' => '#',
                                            'heading' => $product->name,
                                            'body' => $product->description.'<br/>Estoque: '.$product->estoque,
                                            ])->addClass(['mo-galeria']);
                                    })
                                    ->callback('Preço', function ($field, $product){
                                        $valor = str_replace('.', ',', $product->price);
                                        if(strlen($valor)>6){
                                            $valor = substr_replace($valor, '.', -6, 0);
                                        }
                                        if(strlen($valor) > 10){
                                            $valor = substr_replace($valor, '.', -10, 0);
                                        }
                                        return '<div>R$ '.$valor.'</div>';
                                    })
                                    ->callback('Ações', function ($field, $product){
                                        $linkEdit = route('admin.products.edit', ['product' => $product->id]);
                                        $linkShow = route('admin.products.show', ['product' => $product->id]);
                                        $linkFoto = route('admin.products.photorel', ['product' => $product->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-photo"></i>')->asLinkTo($linkFoto);
                                    })
                                !!}
                            </input>
                        </d>
                        </div>
                </div>
            </div>
        </div>
        {{$products->links()}}
    </div>
</div>
@endsection
