@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Detalhamento do pedido nº: {{$order->order_num}}</h5>
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
                                                    @case(2)
                                                    Concluído. (Não pode ser alterado)
                                                    @break
                                                @endswitch
                            </span></div>
                                        <div>Já consta os seguintes itens:</div>
                                        <div style="margin-top: 15px;">
                                            {!!Table::withContents($orderItems)->striped()!!}
                                        </div>
                                        <div style="text-align: right;">Valor Total da Compra: <span>{{number_format($order->total_order, 2, ',', '.') }}</span></div>
                                        <div>
                                            @if($order->status == 1 || $order->status == 2)
                                            {!! Button::success('Continuar comprando')->asLinkTo(route('logado.nossaloja.cont-compra', ['order' => $order->id])) !!}
                                            {!! Button::primary('Pagar')->asLinkTo(route('logado.checkout', ['order' => $order->id])) !!}
                                            {!! Button::primary('Editar')->asLinkTo(route('logado.pedido.editMyOrder', ['order' => $order->id])) !!}
                                            {!! Button::primary('Voltar')->asLinkTo(route('logado.pedido.myorders', ['user' => Auth::user()->id])) !!}
                                            {!! Button::danger('Cancelar')->asLinkTo(route('logado.pedido.destroy', ['order' => $order->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                            <?php $formDelete = FormBuilder::plain([
                                                'id' => 'form-delete',
                                                'route' => ['logado.pedido.destroy', 'order' => $order->id],
                                                'method' => 'DELETE',
                                                'style' => 'display:none',
                                            ]); ?>
                                            {!! form($formDelete) !!}
                                            @else
                                                {!! Button::primary('Voltar')->asLinkTo(route('logado.pedido.myorders', ['user' => Auth::user()->id])) !!}
                                            @endif
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
