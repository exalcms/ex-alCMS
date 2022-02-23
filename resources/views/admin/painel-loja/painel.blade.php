@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Painel de Administração da Loja</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Categorias')->asLinkTo(route('admin.categories.index')) !!}
                                {!! Button::primary('Produtos')->asLinkTo(route('admin.products.index')) !!}
                                {!! Button::primary('Cupons de Descontos')->asLinkTo(route('admin.cupoms.index')) !!}
                                {!! Button::primary('Ordens de Compra')->asLinkTo(route('admin.painel')) !!}
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.dashboard-admin')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!! Table::withContents($orders)->striped()
                                    ->callback('Ação', function ($field, $order){
                                        $linkShow = route('admin.orders.show', ['order' => $order->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow);
                                    })
                                !!}
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
