@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Lista de Compras do cliente {{Auth::user()->name}} </h5>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Limpar')->asLinkTo(route('logado.pedido.myorders', ['user' => Auth::user()->id])) !!}
                                </div>
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                        {!! Table::withContents($orders)->striped()
                                            ->callback('Ação', function ($field, $order){
                                                $linkShow = route('logado.pedido.show', ['order' => $order->id]);
                                                $linkPagar = route('logado.checkout', ['order' => $order->id]);
                                                if($order->status == 1 || $order->status == 2){
                                                return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow)." | ".
                                                       \Bootstrapper\Facades\Button::LINK('<i class="fas fa-dollar-sign"></i>')->asLinkTo($linkPagar);
                                                }else{
                                                    return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow);
                                                }
                                            })->ignore(['Cliente'])
                                        !!}
                                </div>
                            </div>
                        </div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
