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
                                        <div style="text-align: right;">
                                            <form method="post" action="{{route('logado.desconta.order')}}">
                                                @csrf
                                                @method('POST')
                                                <div class="form-row">
                                                    <div class="form-group col-md-12" style="text-align: right; margin-top: 10px;">
                                                        <input name="cupom" type="text" size="25" required placeholder="digite o cupom">
                                                        <input name="order_id" type="hidden" value="{{$order->id}}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12" style="text-align: right;">
                                                        {!! Button::primary('Aplicar Cupom')->submit()->addAttributes(['style' => 'height:30px; text-align: center;']) !!}
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @if($order->total_final == null)
                                        <div style="text-align: right;">Valor Total da Compra: <span>{{number_format($order->total_order, 2, ',', '.') }}</span></div>
                                        @else
                                            <div style="text-align: right;">Valor Total da Compra: <span>{{number_format($order->total_final, 2, ',', '.') }}</span></div>
                                        @endif
                                        <div>
                                            {!! Button::success('Pagar')->asLinkTo(route('logado.pagseguro', ['order' => $order->id]))->addAttributes(['target' => '_blank']) !!}
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
