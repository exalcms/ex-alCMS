@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Editar o pedido nº: {{$order->order_num}}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    <div class="order-esquec" style="margin-bottom: 30px;">
                                        <div>Prezado usuário <span>{{Auth::user()->name}}</span>,</div>
                                        <div>Seu pedido de compra número <span>{{$order->order_num}}</span>.</div>
                                        <div>Encontra-se atualmente com o status
                                            <span>
                                @switch($order->status)
                                                    @case(1)
                                                    Aberto. (Pode ser alterado)
                                                    @break
                                                    @case(2)
                                                    Fechado. (Pode ser alterado)
                                                    @break
                                                    @case(3)
                                                    Processando pagamento. (Não pode ser alterado)
                                                    @break
                                                    @case(4)
                                                    Pago. (Não pode ser alterado)
                                                    @break
                                                    @case(4)
                                                    Concluído. (Não pode ser alterado)
                                                    @break
                                                @endswitch
                            </span></div>
                                        <div>Já consta os seguintes itens:</div>
                                        <form id="form-tit" method="POST" action="#">
                                        <div style="margin-top: 15px;">
                                            <div class="form-row form-prod-bot">
                                                <div class="form-group col-md-4">
                                                    <label for="nomeProd">Nome Prod.</label>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="qtd">Qtd</label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="valorUnit" class="alinha-dir">Valor unit./R$</label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="valorTot" class="alinha-dir">Valor total</label>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                            @foreach($orderItems as $item)
                                                <form id="{{$item->id}}" method="post" action="{{route('logado.atualiza.order')}}">
                                                    @csrf
                                                    @method('POST')
                                                <div class="form-row form-prod-top">
                                                    <div class="form-group col-md-4">
                                                        <input name="product_name" value="{{$item->product->name}}" readonly class="form-control-plaintext">
                                                        <input type="hidden" name="item_id" value="{{$item->id}}" id="itemId-{{$item->id}}">
                                                        <input type="hidden" name="order_id" value="{{$item->order_id}}" id="orderId-{{$item->id}}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        @if($item->product->category->name == 'Anuidade')
                                                            <input class="number-tc" type="number" name="qtd" id="qtd-{{$item->id}}" min="0" max="1" value="{{$item->qtd}}">
                                                        @else
                                                            <input class="number-tc" type="number" name="qtd" id="qtd-{{$item->id}}" min="0" value="{{$item->qtd}}">
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-2 alinha-dir">
                                                        <input name="valor_unit" id="vlritem-{{$item->id}}" value="{{ number_format($item->product->price, 2, ',', '.') }}" size="15" readonly class="form-control-plaintext alinha-cent">
                                                    </div>
                                                    <div class="form-group col-md-3 alinha-dir">
                                                        <input name="valor_total" id="vlrtot-{{$item->id}}" value="{{number_format($item->total_item, 2, ',', '.')}}" size="20" readonly class="form-control-plaintext alinha-cent" >
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                    {!! Button::primary('Alterar')->submit() !!}
                                                    </div>
                                                </div>
                                                </form>
                                            @endforeach
                                        <div class="row vlr-tot"><div>Valor Total da Compra:</div><div style="text-align: right;"> <span>{{number_format($order->total_order, 2, ',', '.')}}</span></div>
                                        </div>
                                        <div>
                                            {!! Button::primary('Salvar')->submit() !!}
                                            {!! Button::primary('Voltar')->asLinkTo(route('logado.pedido.myorders', ['user' => Auth::user()->id])) !!}
                                        </div>
                                    </div>
                                    <div class="divider"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
