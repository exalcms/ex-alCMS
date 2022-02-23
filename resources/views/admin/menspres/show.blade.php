@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Exibir mensagem do Presidente</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.menspres.index')) !!}
                                {!! Button::primary('Editar')->asLinkTo(route('admin.menspres.edit', ['menspre' => $menspre->id])) !!}
                                {!! Button::danger('Delete')
                                        ->asLinkTo(route('admin.menspres.destroy', ['menspre' => $menspre->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                <?php $formDelete = FormBuilder::plain([
                                    'id' => 'form-delete',
                                    'route' => ['admin.menspres.destroy', 'menspre' => $menspre->id],
                                    'method' => 'DELETE',
                                    'style' => 'display:none',
                                ]); ?>
                                {!! form($formDelete) !!}
                            </div>
                            <div class="row">
                                <div id="register-show-quem">
                                    <div class="row col-12 espa-show">
                                        <div>
                                            <h6 class="block font-medium text-sm text-gray-700 label-show-quem">Tema da Mensagem (subtítulo)</h6>
                                            <div class="quem-show">
                                                {!! $menspre->tema !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">Introdução</h5>
                                            <div class="quem-show">
                                                {!! $menspre->introd !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">Texto</h5>
                                            <div class="quem-show">
                                                {!! $menspre->texto !!}
                                            </div>
                                        </div>
                                    </div>
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
