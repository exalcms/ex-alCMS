@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Detalhes do Cupom Promocional - criado/alterado por: {{$cupom->user->name}}</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.cupoms.index')) !!}
                                {!! Button::primary('Editar')->asLinkTo(route('admin.cupoms.edit', ['cupom' => $cupom->id])) !!}
                                {!! Button::danger('Delete')
                                        ->asLinkTo(route('admin.cupoms.destroy', ['cupom' => $cupom->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                <?php $formDelete = FormBuilder::plain([
                                    'id' => 'form-delete',
                                    'route' => ['admin.cupoms.destroy', 'cupom' => $cupom->id],
                                    'method' => 'DELETE',
                                    'style' => 'display:none',
                                ]); ?>
                                {!! form($formDelete) !!}
                            </div>
                            <div class="cupom-show">
                                    <div class="row col-3 ">
                                        <div>
                                            <h6 class="block font-medium text-sm text-gray-700 label-show-quem">Nome Campanha</h6>
                                            <div class="quem-show" style="background-color: blueviolet; color: white;">
                                                {!! $cupom->name !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-4 ">
                                        <div>
                                            <h5 class="label-show-quem">Código</h5>
                                            <div class="quem-show" style="background-color: blueviolet; color: white;">
                                                {!! $cupom->code !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-3 ">
                                        <div>
                                            <h5 class="label-show-quem">Desconto</h5>
                                            <div class="quem-show" style="background-color: blueviolet; color: white;">
                                                @if($cupom->percent == true)
                                                    {!! $cupom->value."% sobre o valor total" !!}
                                                @else
                                                    {{ "R$ ".number_format($cupom->value, 2, ',', '.')." sobre o valor total "}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <div class="row col-2 ">
                                    <div>
                                        <h5 class="label-show-quem">Aplic.</h5>
                                        <div class="quem-show" style="background-color: blueviolet; color: white;">
                                                {!! $count !!}
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
