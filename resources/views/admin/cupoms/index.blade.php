@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Cupons promocionais</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Novo')->asLinkTo(route('admin.cupoms.create')) !!}
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.cupoms.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($cupoms)->striped()
                                    ->callback('Actions', function ($field, $cupom){
                                        $linkEdit = route('admin.cupoms.edit', ['cupom' => $cupom->id]);
                                        $linkShow = route('admin.cupoms.show', ['cupom' => $cupom->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow);
                                    })
                                !!}
                            </div>
                        </div>
                        </div>
                    {{ $cupoms->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
