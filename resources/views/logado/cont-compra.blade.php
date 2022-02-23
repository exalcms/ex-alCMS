@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Nossa Loja</h5>
                            </div>
                            <div class="panel-body">
                                <div class="card-loja">
                                    @foreach($products as $product)
                                            <div class="card border-primary mb-3" style="width: 18rem;">
                                                <div class="card-img-top">
                                                    @foreach($product->photos as $photo)
                                                        <img src="{{asset($photo->photo_path)}}" alt="{{$product->name}}">
                                                       @break
                                                    @endforeach
                                                </div>
                                                <div class="card-body">
                                                    <span class="card-title grey-text text-darken-4 truncate" title="{{ $product->name }}">{{ $product->name }}</span>
                                                    <p class="card-text">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <a class="blue-text" href="{{ route('logado.produto-cont', ['product' => $product->id, 'order' => $order->id]) }}">Veja mais informações</a>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
