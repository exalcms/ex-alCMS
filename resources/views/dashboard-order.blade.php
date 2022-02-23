@extends('layouts.excms')

@section('conteudo')

    <div class="py-12" style="margin-top: 80px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="rol order-esquec">
                        <div>Prezado usuário <span>{{Auth::user()->name}}</span>,</div>
                        <div>Existe no sistema um pedido de compra com o status
                            <span>
                                @switch($order->status)
                                    @case(1)
                                    Aberto.
                                    @break
                                    @case(2)
                                    Fechado.
                                    @break
                                @endswitch
                            </span></div>
                        <div>Pedido número: {{$order->order_num}}</div>
                        <div>Data {{ \Carbon\Carbon::parse($order->date)->format('d/m/Y') }}</div>
                        <div>O que você deseja fazer com este pedido?</div>
                        <div class="row btn-new-reset">
                            {!! Button::primary('Continuar comprando')->asLinkTo(route('logado.nossaloja.cont-compra', ['order' => $order->id])) !!}
                            {!! Button::primary('Ver pedido')->asLinkTo(route('logado.pedido.show', ['order' => $order->id])) !!}
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

                <x-jet-welcome />
            </div>
        </div>
    </div>
@endsection
