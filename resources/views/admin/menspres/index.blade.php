@extends('layouts.excms')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Lista de Mensagens do Presidente</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Nova')->asLinkTo(route('admin.menspres.create')) !!}
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.menspres.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($menspres)->striped()
                                    ->callback('Actions', function ($field, $menspre){
                                        $linkEdit = route('admin.menspres.edit', ['menspre' => $menspre->id]);
                                        $linkShow = route('admin.menspres.show', ['menspre' => $menspre->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow);
                                    })
                                !!}
                            </div>
                        </div>
                        </div>
                    {{ $menspres->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
