@extends('layouts.excms')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Mensagem de {{ $mensagem->nome }}</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.mensagems.index')) !!}
                                {!! Button::primary('Editar')->asLinkTo(route('admin.mensagems.edit', ['mensagem' => $mensagem->id])) !!}
                                {!! Button::danger('Delete')
                                        ->asLinkTo(route('admin.mensagems.destroy', ['mensagem' => $mensagem->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                <?php $formDelete = FormBuilder::plain([
                                    'id' => 'form-delete',
                                    'route' => ['admin.mensagems.destroy', 'mensagem' => $mensagem->id],
                                    'method' => 'DELETE',
                                    'style' => 'display:none',
                                ]); ?>
                                {!! form($formDelete) !!}
                            </div>
                            <div class="row">
                                <div id="register-show">
                                    <div class="row bloco-div-show deskmy">
                                        <div style="width: 100%">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Remetente</h6>
                                            <div class="msgm-show">
                                                {{ $mensagem->nome }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show deskmy">
                                        <div style="width: 100%">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Assunto</h6>
                                            <div class="quem-show">
                                                {{ $mensagem->subject }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show deskmy">
                                        <div style="width: 58%">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">E-mail</h6>
                                            <div class="quem-show">
                                                {{ $mensagem->email }}
                                            </div>
                                        </div>
                                        <div style="width: 38%">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Data</h6>
                                            <div class="quem-show">
                                                {{ \Carbon\Carbon::parse($mensagem->updated_at)->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row bloco-div-show deskmy">
                                        <div style="width: 100%">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Mensagem</h6>
                                            <div class="quem-show">
                                                {!! $mensagem->mensagem !!}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
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
