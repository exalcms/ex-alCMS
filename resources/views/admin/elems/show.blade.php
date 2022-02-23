@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Conteúdo sobre a Associação no Site</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.elems.index')) !!}
                                {!! Button::primary('Editar')->asLinkTo(route('admin.elems.edit', ['elem' => $elem->id])) !!}
                                {!! Button::danger('Delete')
                                        ->asLinkTo(route('admin.elems.destroy', ['elem' => $elem->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                <?php $formDelete = FormBuilder::plain([
                                    'id' => 'form-delete',
                                    'route' => ['admin.elems.destroy', 'elem' => $elem->id],
                                    'method' => 'DELETE',
                                    'style' => 'display:none',
                                ]); ?>
                                {!! form($formDelete) !!}
                            </div>
                            <div class="row">
                                <div id="register-show-quem">
                                    <div class="row col-12 espa-show">
                                        <div>
                                            <h6 class="block font-medium text-sm text-gray-700 label-show-quem">Quem Somos (subtítulo)</h6>
                                            <div class="quem-show">
                                                {!! $elem->quem_somos !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">Quem Somos (Texto de abertura)</h5>
                                            <div class="quem-show">
                                                {!! $elem->text_abert !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">Missão</h5>
                                            <div class="quem-show">
                                                {!! $elem->missao !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">Visão</h5>
                                            <div class="quem-show">
                                                {!! $elem->visao !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">Valores</h5>
                                            <div class="quem-show">
                                                {!! $elem->valores !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">O que oferecemos (título)</h5>
                                            <div class="quem-show">
                                                {!! $elem->oferec_title !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">O que oferecemos (texto)</h5>
                                            <div class="quem-show">
                                                {!! $elem->oferec_text !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">É fácil se associar (título)</h5>
                                            <div class="quem-show">
                                                {!! $elem->se_associa_title !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">É fácil se associar (texto)</h5>
                                            <div class="quem-show">
                                                {!! $elem->se_associa_text !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">História da Associação (título)</h5>
                                            <div class="quem-show">
                                                {!! $elem->histo_title !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">História da Associação (subtítulo)</h5>
                                            <div class="quem-show">
                                                {!! $elem->histo_subtitulo !!}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="label-show-quem">História da Associação (resumo)</h5>
                                            <div class="quem-show">
                                                {!! $elem->histo_resum !!}
                                            </div>
                                        </div>

                                        <div>
                                            <h5 class="label-show-quem">História da Associação (texto)</h5>
                                            <div class="quem-show">
                                                {!! $elem->histo_text !!}
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
