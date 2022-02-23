@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Editar Dados da Associação</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.elems.index')) !!}
                            </div>
                            <div class="form-admin">
                                <?php $icon = '<i class="fas fa-save"></i>'; ?>
                                    <form method="POST" action="{{ route('admin.elems.myupdate') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="idelem" value="{{ $elem->id }}">
                                        <div class="form-group">
                                            <div class="camp-editor">
                                                <x-jet-label for="quem_somos" value="{{__('Quem Somos (subtítulo)')}}" />
                                                <x-jet-input id="quem_somos" class="block mt-1 w-full" type="text" name="quem_somos" value="{!! $elem->quem_somos !!}" />
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="text_abert" value="{{__('Texto de Abertura do Quem Somos')}}" />
                                                <textarea id="text_abert" class="ckeditor form-control" name="text_abert">{!! $elem->text_abert !!}</textarea>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="missao" value="{{__('Missão')}}" />
                                                <textarea id="missao" class="ckeditor form-control" name="missao">{!! $elem->missao !!}</textarea>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="visao" value="{{__('Visão')}}" />
                                                <textarea id="visao" class="ckeditor form-control" name="visao">{!! $elem->visao !!}</textarea>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="valores" value="{{__('Valores')}}" />
                                                <textarea id="valores" class="ckeditor form-control" name="valores">{!! $elem->valores !!}</textarea>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="oferec_title" value="{{__('O que oferecemos (título)')}}" />
                                                <x-jet-input id="oferec_title" class="block mt-1 w-full" type="text" name="oferec_title" value="{!! $elem->oferec_title !!}" />
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="oferec_text" value="{{__('O que oferecemos (texto)')}}" />
                                                <textarea id="oferec_text" class="ckeditor form-control" name="oferec_text">{!! $elem->oferec_text !!}</textarea>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="se_associa_title" value="{{__('É fácil se associar (título)')}}" />
                                                <x-jet-input id="se_associa_title" class="block mt-1 w-full" type="text" name="se_associa_title" value="{!! $elem->se_associa_title !!}" />
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="se_associa_text" value="{{__('É fácil se associar (texto)')}}" />
                                                <textarea id="se_associa_text" class="ckeditor form-control" name="se_associa_text">{!! $elem->se_associa_text !!}</textarea>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="histo_title" value="{{__('História da Associação (título)')}}" />
                                                <x-jet-input id="histo_title" class="block mt-1 w-full" type="text" name="histo_title" value="{!! $elem->histo_title !!}" />
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="histo_subtitulo" value="{{__('História da Associação (subtítulo)')}}" />
                                                <x-jet-input id="histo_subtitulo" class="block mt-1 w-full" type="text" name="histo_subtitulo" value="{!! $elem->histo_subtitulo !!}"/>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="histo_resum" value="{{__('História da Associação (resumo)')}}" />
                                                <textarea id="histo_resum" class="ckeditor form-control" name="histo_resum">{!! $elem->histo_resum !!}</textarea>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="histo_text" value="{{__('História da Associação (texto)')}}" />
                                                <textarea id="histo_text" class="ckeditor form-control" name="histo_text">{!! $elem->histo_text !!}</textarea>
                                            </div>
                                            <div class="flex items-center justify-end mt-4">
                                                <x-jet-button class="ml-4">
                                                    {{ __('Alterar') }}
                                                </x-jet-button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.assoc.index')) !!}
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
