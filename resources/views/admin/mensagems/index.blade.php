@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">

                            <h5>Lista de usuários</h5>
                            <div class="form-search">
                                <form action="{{ route('admin.mensagems.index') }}" method="get">
                                    <label class="label-search">Pesquisar</label>
                                    <x-jet-input id="search" class="mt-1 w-full" type="search" name="search"/>
                                    <div class="buton-search">
                                    <x-jet-button class="ml-4 buton-sch">
                                         {{ __('Pesquisar') }}
                                    </x-jet-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.mensagems.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($mensagems)->striped()
                                    ->callback('Actions', function ($field, $mensagem){
                                        $linkEdit = route('admin.mensagems.edit', ['mensagem' => $mensagem->id]);
                                        $linkShow = route('admin.mensagems.show', ['mensagem' => $mensagem->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-reply"></i>')->asLinkTo($linkEdit)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow);
                                    })
                                !!}
                            </div>
                        </div>
                        </div>
                    {{ $mensagems->links() }}

                </div>
            </div>
        </div>


    </div>
</div>
@endsection
