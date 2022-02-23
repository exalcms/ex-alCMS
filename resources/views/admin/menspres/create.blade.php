@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Cadastrar Nova Mensagem do Presidente</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.menspres.index')) !!}
                            </div>
                            <x-jet-validation-errors class="mb-4" />
                            <div class="form-admin">
                                <?php $icon = '<i class="fas fa-save"></i>';?>
                                <form method="POST" action="{{route('admin.menspres.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <div class="camp-editor">
                                            <x-jet-label for="tema" value="{{__('Tema abordado')}}" />
                                            <x-jet-input id="tema" class="block mt-1 w-full" type="text" name="tema" :value="old('tema')"/>
                                        </div>
                                        <div class="camp-editor">
                                            <x-jet-label for="introd" value="{{__('Introdução')}}" />
                                            <textarea id="introd" class="ckeditor form-control" :value="old('introd')" name="introd"></textarea>
                                        </div>
                                        <div class="camp-editor">
                                            <x-jet-label for="texto" value="{{__('Mensagem')}}" />
                                            <textarea id="texto" class="ckeditor form-control" name="texto" ></textarea>
                                        </div>
                                        <div class="row bloco-div desk" style="margin-left: 30px; margin-top: 20px;">
                                            <div class="nome">
                                                <x-jet-label for="publica" value="{{ __('Publica a mensagem?') }}" />
                                                <input type="radio" name="publica" value="s"/> Sim
                                                <input type="radio" name="publica" value="n"/> Não
                                            </div>
                                            <div class="nome">
                                                <x-jet-label for="ativa" value="{{ __('A mensagem está ativa?') }}" />
                                                <input type="radio" name="ativa" value="s"/> Sim
                                                <input type="radio" name="ativa" value="n" /> Não
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-jet-button class="ml-4">
                                            {{ __('Cadastrar') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
