@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Editar Cargo</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.menspres.index')) !!}
                            </div>
                            <div class="form-admin">
                                <?php $icon = '<i class="fas fa-save"></i>'; ?>
                                    <form method="POST" action="{{route('admin.menspres.update', ['menspre' => $menspre->id])}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{$menspre->id}}">
                                            <div class="camp-editor">
                                                <x-jet-label for="tema" value="{{__('Tema abordado')}}" />
                                                <x-jet-input id="tema" class="block mt-1 w-full" type="text" name="tema" :value="old('tema')" value="{!! $menspre->tema !!}"/>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="introd" value="{{__('Introdução')}}" />
                                                <textarea id="introd" class="ckeditor form-control" value="" name="introd">{!! $menspre->introd !!}</textarea>
                                            </div>
                                            <div class="camp-editor">
                                                <x-jet-label for="texto" value="{{__('Mensagem')}}" />
                                                <textarea id="texto" class="ckeditor form-control" name="texto" >{!! $menspre->texto !!}</textarea>
                                            </div>
                                            <div class="row bloco-div desk" style="margin-left: 30px; margin-top: 20px;">
                                                <div class="nome">
                                                    <x-jet-label for="publica" value="{{ __('Publica a mensagem?') }}" />
                                                    @if($menspre->publica == 's')
                                                    <input type="radio" name="publica" value="s" checked/> Sim
                                                    <input type="radio" name="publica" value="n"/> Não
                                                    @else
                                                        <input type="radio" name="publica" value="s"/> Sim
                                                        <input type="radio" name="publica" value="n" checked /> Não
                                                    @endif
                                                </div>
                                                <div class="nome">
                                                    <x-jet-label for="ativa" value="{{ __('A mensagem está ativa?') }}" />
                                                    @if($menspre->ativa == 's')
                                                        <input type="radio" name="ativa" value="s" checked/> Sim
                                                        <input type="radio" name="ativa" value="n"/> Não
                                                    @else
                                                        <input type="radio" name="ativa" value="s"/> Sim
                                                        <input type="radio" name="ativa" value="n" checked /> Não
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-end mt-4">
                                            <x-jet-button class="ml-4">
                                                {{ __('Alterar') }}
                                            </x-jet-button>
                                        </div>
                                    </form>
                            </div>
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.menspres.index')) !!}
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
