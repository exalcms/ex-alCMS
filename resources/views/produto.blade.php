@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>{{$product->name}}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    <div class="divider"></div>
                                    <div class="section col s12 m6 l4">
                                        <div class="card small">
                                            <div id="carrouselControls" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="hover">
                                                <div class="carousel-inner">
                                                    <?php $i=0;?>
                                                    @foreach($product->photos as $photo)
                                                        @if($i == 0)
                                                        <div class="carousel-item active">
                                                            <img class="col s12 m12 l12 materialboxed" data-caption="{{ $product->name }}" src="{{asset($photo->photo_path)}}" alt="{{ $product->name }}" title="{{ $product->name }}">
                                                        </div>
                                                        @else
                                                                <div class="carousel-item">
                                                                    <img class="col s12 m12 l12 materialboxed" data-caption="{{ $product->name }}" src="{{asset($photo->photo_path)}}" alt="{{ $product->name }}" title="{{ $product->name }}">
                                                                </div>
                                                        @endif
                                                        <?php $i++; ?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section col s12 m6 l6">
                                        <h4 class="left col l6"> R$ {{ number_format($product->price, 2, ',', '.') }} </h4>
                                        <form method="POST" action="{{route('logado.carrinho.adicionar')}}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            @if($product->category->name == 'Anuidade')
                                                <input class="text" name="qtde" value="1" size="55" disabled="disabled">
                                            <input type="hidden" name="qtd" value="1">
                                            @else
                                            <input class="number-tc" type="number" name="qtd" id="qtd" min="1" value="1">
                                            @endif
                                            <button type="submit" class="btn btn-success btn-block">Comprar</button>
                                        </form>
                                    </div>
                                    <div class="section col s12 m6 l6">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
