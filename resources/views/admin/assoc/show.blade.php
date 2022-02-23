@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>{{ $assoc->raz_soc }}</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.assoc.index')) !!}
                                {!! Button::primary('Editar')->asLinkTo(route('admin.assoc.edit', ['assoc' => $assoc->id])) !!}
                                {!! Button::danger('Delete')
                                        ->asLinkTo(route('admin.assoc.destroy', ['assoc' => $assoc->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                <?php $formDelete = FormBuilder::plain([
                                    'id' => 'form-delete',
                                    'route' => ['admin.assoc.destroy', 'assoc' => $assoc->id],
                                    'method' => 'DELETE',
                                    'style' => 'display:none',
                                ]); ?>
                                {!! form($formDelete) !!}
                            </div>
                            <div class="row">
                                <div id="register-show">
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Razão Social</h6>
                                            <div class="texto-show">
                                                {{ $assoc->raz_soc }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">CNPJ</h6>
                                            <div class="texto-show">
                                                {{ $assoc->cnpj }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">E-mail</h6>
                                            <div class="texto-show">
                                                {{ $assoc->email }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc rd_soc" style="margin-left: 15px !important;">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Telefone</h6>
                                            <div class="texto-show">
                                                {{ $assoc->tel }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc rd_soc" style="margin-left: 15px !important;">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">CEP</h6>
                                            <div class="texto-show">
                                                {{ $assoc->cep }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Endereço</h6>
                                            <div class="texto-show">
                                                {{ $assoc->end }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk" style="justify-content: left !important;">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Cidade</h6>
                                            <div class="texto-show">
                                                {{ $assoc->cidade." - ".$assoc->uf." - BR" }}
                                            </div>
                                        </div>
                                        <div class="nome" style="margin-left: 15px !important;">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Site</h6>
                                            <div class="texto-show">
                                                {{ $assoc->site}}
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
