@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Perfil do usuário {{ $user->name }}</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Voltar')->asLinkTo(route('admin.users.index')) !!}
                                {!! Button::primary('Editar')->asLinkTo(route('admin.users.edit', ['user' => $user->id])) !!}
                                {!! Button::danger('Delete')
                                        ->asLinkTo(route('admin.users.destroy', ['user' => $user->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                             !!}
                                <?php $formDelete = FormBuilder::plain([
                                    'id' => 'form-delete',
                                    'route' => ['admin.users.destroy', 'user' => $user->id],
                                    'method' => 'DELETE',
                                    'style' => 'display:none',
                                ]); ?>
                                {!! form($formDelete) !!}
                            </div>
                            <div class="row">
                                <div id="register-show">
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Nome Completo</h6>
                                            <div class="texto-show">
                                                {{ $user->name_full }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Nome Social</h6>
                                            <div class="texto-show">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">E-mail</h6>
                                            <div class="texto-show">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">CPF</h6>
                                            <div class="texto-show">
                                                {{ $user->cpf }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome dt-nasc">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Data Nascimento</h6>
                                            <div class="texto-show">
                                                {{ \Carbon\Carbon::parse($user->dtnasc)->format('d/m/Y') }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Gênero</h6>
                                            <div class="texto-show">
                                                @if($user->sexo == 'm') Masculino
                                                @else Feminino
                                                @endif
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Associado?</h6>
                                            <div class="texto-show">
                                                @if($user->assoc == 's') Associado
                                                @else Não Associado
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome dt-nasc">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Ex-Aluno?</h6>
                                            @if($user->ex_aluno == 's')
                                            <div class="texto-show">
                                                 Sim
                                            </div>
                                            @else
                                                <?php $sponsor = \App\Models\User::where('cpf', '=', $user->indicado_por)->first(); ?>
                                                    <div class="texto-show ex-al-show">
                                                    Não - Ind.: {{$sponsor->nome_guerra}}
                                                    </div>
                                            @endif
                                        </div>
                                        <div class="nome dt-nasc">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Telefone</h6>
                                            @if($user->tel_fixo == null)
                                                <div class="texto-show">
                                                    {{ $user->celular }}
                                                </div>
                                            @else
                                                <div class="texto-show ex-al-show">
                                                    {{$user->celular." - ".$user->tel_fixo}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="nome dt-nasc">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">RG</h6>
                                            @if($user->rg == null)
                                                <div class="texto-show">
                                                 Não informado
                                                </div>
                                            @else
                                                <div class="texto-show ex-al-show">
                                                    {{$user->rg." - ".$user->emissor_rg}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Endereço</h6>
                                            <div class="texto-show">
                                                {{ $user->end." Num.: ".$user->num_end }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Complemento</h6>
                                            <div class="texto-show">
                                                {{ $user->complem_end }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk" style="justify-content: left !important;">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Bairro</h6>
                                            <div class="texto-show">
                                                {{ $user->bairro }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc rd_soc" style="margin-left: 35px !important;">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">CEP</h6>
                                            <div class="texto-show">
                                                {{ $user->cep }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Cidade</h6>
                                            <div class="texto-show">
                                                {{ $user->city." - ".$user->state." - ".$user->country }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Nome de Guerra / Número</h6>
                                            <div class="texto-show">
                                                {{ $user->nome_guerra." / ".$user->num_cms }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Ano de Ingresso</h6>
                                            <div class="texto-show">
                                                {{ $user->ano_ingres }}
                                            </div>
                                        </div>
                                        <div class="nome dt-nasc">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Ano de Saída</h6>
                                            <div class="texto-show">
                                                {{ $user->ano_saida }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Formação</h6>
                                            <div class="texto-show">
                                                {{ $user->formacao }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Ocupação</h6>
                                            <div class="texto-show">
                                                {{ $user->ocupacao }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Local de Trabalho</h6>
                                            <div class="texto-show">
                                                {{ $user->loc_trab }}
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Tel Comercial</h6>
                                            <div class="texto-show">
                                                {{ $user->tel_com }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome endere">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Redes Sociais</h6>
                                            <div class="texto-show">
                                                {{ $user->redes_sociais }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row bloco-div-show desk">
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Autoriza E-mail</h6>
                                            <div class="texto-show">
                                                @if($user->auto_mail == 's') Autoriza envio de e-mails
                                                @else Não Autoriza envio de e-mails
                                                @endif
                                            </div>
                                        </div>
                                        <div class="nome">
                                            <h6 class="block font-medium text-sm text-gray-700 label-show">Autoriza Avisos</h6>
                                            <div class="texto-show">
                                                @if($user->auto_assoc == 's') Autoriza envio de avisos
                                                @else Não Autoriza envio de avisos
                                                @endif
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
