@extends('layouts.excms')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-6 text-gray-500" style="display: flex; justify-content: center;">
        <div class="logocms">
            <img src="{{asset('site/img/apple-touch-icon.png')}}" width="100" alt="" class="img-fluid">
        </div>
    </div>

    <!-- AREA DO FORMULARIO -->
            <div id="form-register">
                <form method="POST" action="{{ route('profile.show-cms.atual') }}">
                    @csrf
                        <input type="hidden" name="iduser" value="{{$user->id}}">
                    <!-- bloco nome -->
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="name_full" value="{{ __('Nome Completo*') }}" />
                                <x-jet-input id="name_full" class="block mt-1 w-full" type="text" name="name_full" value="{{$user->name_full}}" oninput="handleInput(event)" required autofocus autocomplete="name_full" />
                            </div>
                            <div class="nome">
                                <x-jet-label for="name" value="{{ __('Nome social*') }}" />
                                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus autocomplete="name" oninput="handleInput(event)" />
                            </div>
                        </div>

                        <!-- bloco email/CPF -->
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="email" value="{{ __('Email*') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required autofocus />
                            </div>
                            <div class="nome">
                                <x-jet-label for="cpf" value="{{ __('CPF*') }}" />
                                <x-jet-input id="cpf" class="block mt-1 w-full" type="cpf" name="cpf" value="{{$user->cpf}}" required autofocus placeholder="xxx.xxx.xxx-xx" />
                            </div>
                        </div>

                        <!-- bloco dt_nasc/sexo/assoc/ex-alu/indic -->
                        <div class="row bloco-div desk">
                            <div class="nome dt-nasc">
                                <x-jet-label for="dtnasc" value="{{ __('Data Nascimento*') }}" />
                                <x-jet-input id="dtnasc" class="block mt-1 w-full" type="text" name="dtnasc" value="{{ \Carbon\Carbon::parse($user->dtnasc)->format('d/m/Y') }}" placeholder="dd/mm/aaaa" required  autofocus/>
                            </div>
                            <div class="nome dt-nasc">
                                <x-jet-label for="sexo" value="{{ __('Gênero*') }}" />
                                @if($user->sexo == 'm')
                                    <input id="sexo" type="radio" name="sexo" value="m" checked/> Masculino
                                    <input type="radio" name="sexo" value="f"/> Feminino
                                @else
                                    <input id="sexo" type="radio" name="sexo" value="m" /> Masculino
                                    <input type="radio" name="sexo" value="f" checked/> Feminino
                                @endif
                            </div>
                            <div class="nome dt-nasc">
                                <x-jet-label for="assoc" value="{{ __('Associado?*') }}" />
                                @if($user->assoc == 's')
                                <input type="radio" name="assoc" value="s" checked/> Sim
                                <input type="radio" name="assoc" value="n" /> Não
                                @else
                                    <input type="radio" name="assoc" value="s" /> Sim
                                    <input type="radio" name="assoc" value="n" checked/> Não
                                @endif
                            </div>
                        </div>
                        <!-- bloco rg/emissor/celular/tel fixo -->
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="rg" value="{{ __('RG') }}" />
                                <x-jet-input id="rg" class="block mt-1 w-full" type="text" name="rg" value="{{$user->rg}}" placeholder="Apenas números" />
                            </div>
                            <div class="nome">
                                <x-jet-label for="emissor_rg" value="{{ __('Emissor') }}" />
                                <x-jet-input id="emissor_rg" class="block mt-1 w-full" type="text" name="emissor_rg" value="{{$user->emissor_rg}}" oninput="handleInput(event)" />
                            </div>
                            <div class="nome">
                                <x-jet-label for="celular" value="{{ __('Celular*') }}" />
                                <x-jet-input id="celular" class="block mt-1 w-full" type="text" name="celular" value="{{$user->celular}}" placeholder="Apenas números" required />
                            </div>
                            <div class="nome">
                                <x-jet-label for="tel_fixo" value="{{ __('Telefone Fixo') }}" />
                                <x-jet-input id="tel_fixo" class="block mt-1 w-full" type="text" name="tel_fixo" value="{{$user->tel_fixo}}" placeholder="Apenas números" />
                            </div>
                        </div>
                        <!-- bloco end -->
                        <div class="row bloco-div desk">
                            <div class="endere">
                                <x-jet-label for="end" value="{{ __('Endereço*') }}" />
                                <x-jet-input id="end" class="block mt-1 w-full" type="text" name="end" value="{{$user->end}}" required oninput="handleInput(event)" />
                            </div>
                            <div class="end_num">
                                <x-jet-label for="num_end" value="{{ __('Num.') }}" />
                                <x-jet-input id="num_end" class="block mt-1 w-full" type="text" name="num_end" value="{{$user->num_end}}" />
                            </div>
                            <div class="comple">
                                <x-jet-label for="complem_end" value="{{ __('Complemento') }}" />
                                <x-jet-input id="complem_end" class="block mt-1 w-full" type="text" name="complem_end" value="{{$user->complem_end}}"  oninput="handleInput(event)" />
                            </div>
                        </div>
                        <!-- bloco Cep -->
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="cep" value="{{ __('CEP*') }}" />
                                <x-jet-input id="cep" class="block mt-1 w-full" type="text" name="cep" value="{{$user->cep}}" required />
                            </div>
                            <div class="nome">
                                <x-jet-label for="bairro" value="{{ __('Bairro*') }}" />
                                <x-jet-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" value="{{$user->bairro}}" required oninput="handleInput(event)"/>
                            </div>
                        </div>
                        <div class="row bloco-div desk">
                            <div class="nome endere">
                                <x-jet-label for="city" value="{{ __('Cidade*') }}" />
                                <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" value="{{$user->city}}" required oninput="handleInput(event)"/>
                            </div>
                            <div class="nome pais">
                                <x-jet-label for="state" value="{{ __('UF*') }}" />
                                <x-jet-input id="state" class="block mt-1 w-full" type="text" name="state" value="{{$user->state}}" maxlength="2" required oninput="handleInput(event)"/>
                            </div>
                            <div class="nome pais">
                                <x-jet-label for="country" value="{{ __('Pais*') }}" />
                                <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country" value="{{$user->country}}" maxlength="2" required oninput="handleInput(event)" />
                            </div>
                        </div>
                        <!-- bloco cms -->
                        <hr/>
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="nome_guerra" value="{{ __('Nome de guerra') }}" />
                                <x-jet-input id="nome_guerra" class="block mt-1 w-full" type="text" name="nome_guerra" value="{{$user->nome_guerra}}" oninput="handleInput(event)" />
                            </div>
                            <div class="nome">
                                <x-jet-label for="num_cms" value="{{ __('Número') }}" />
                                <x-jet-input id="num_cms" class="block mt-1 w-full" type="text" name="num_cms" value="{{$user->num_cms}}"/>
                            </div>
                        </div>
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="ano_ingres" value="{{ __('Ano Ingresso') }}" />
                                <x-jet-input id="ano_ingres" class="block mt-1 w-full" type="text" name="ano_ingres" value="{{$user->ano_ingres}}" maxlength="4"/>
                            </div>
                            <div class="nome">
                                <x-jet-label for="ano_saida" value="{{ __('Ano saída') }}" />
                                <x-jet-input id="ano_saida" class="block mt-1 w-full" type="text" name="ano_saida" value="{{$user->ano_saida}}" maxlength="4" />
                            </div>
                        </div>
                        <!-- bloco profissao -->
                        <hr/>
                        <div class="inter_title">
                            <span>{{ __('FORMAÇÃO PROFISSIONAL') }}</span>
                        </div>
                        <hr/>
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="formacao" value="{{ __('Formação') }}" />
                                <x-jet-input id="formacao" class="block mt-1 w-full" type="text" name="formacao" value="{{$user->formacao}}" oninput="handleInput(event)" />
                            </div>
                            <div class="nome">
                                <x-jet-label for="ocupacao" value="{{ __('Ocupação') }}" />
                                <x-jet-input id="ocupacao" class="block mt-1 w-full" type="text" name="ocupacao" value="{{$user->ocupacao}}" oninput="handleInput(event)" />
                            </div>
                        </div>
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="loc_trab" value="{{ __('Local de Trabalho') }}" />
                                <x-jet-input id="loc_trab" class="block mt-1 w-full" type="text" name="loc_trab" value="{{$user->loc_trab}}" oninput="handleInput(event)" />
                            </div>
                            <div class="nome">
                                <x-jet-label for="tel_com" value="{{ __('Tel. Comercial') }}" />
                                <x-jet-input id="tel_com" class="block mt-1 w-full" type="text" name="tel_com" value="{{$user->tel_com}}" />
                            </div>
                        </div>

                        <!-- bloco redes sociais -->
                        <hr/>
                        <div class="inter_title">
                            <span>{{ __('REDES SOCIAIS') }}</span>
                        </div>
                        <div class="inter_title">
                            <span>{{ __('(selecione as que você usa)') }}</span>
                        </div>

                        <hr/>
                        <div class="row bloco-div desk">
                            <div class="rd_soc">
                                <input type="checkbox" id="face" name="redes_sociais[]" value="Facebook">
                                <label for="inlineCheckbox1">Facebook</label>
                            </div>
                            <div class="rd_soc">
                                <input type="checkbox" id="zap" name="redes_sociais[]" value="WhatsApp">
                                <label for="inlineCheckbox1">WhatsApp</label>
                            </div>
                            <div class="rd_soc">
                                <input type="checkbox" id="twitter" name="redes_sociais[]" value="Twitter">
                                <label for="inlineCheckbox1">Twitter</label>
                            </div>
                        </div>
                        <div class="row bloco-div desk">
                            <div class="rd_soc">
                                <input type="checkbox" id="sigma" name="redes_sociais[]" value="Sigma">
                                <label class="form-check-label" for="inlineCheckbox1">Sigma</label>
                            </div>
                            <div class="rd_soc">
                                <input type="checkbox" id="telegram" name="redes_sociais[]" value="Telegram">
                                <label for="inlineCheckbox1">Telegram</label>
                            </div>
                            <div class="rd_soc">
                                <input type="checkbox" id="insta" name="redes_sociais[]" value="Instagram">
                                <label for="inlineCheckbox1">Instagram</label>
                            </div>
                        </div>

                        <!-- bloco autorizacoes -->
                        <hr/>
                        <div class="inter_title">
                            <span>{{ __('Autorizações') }}</span>
                        </div>
                        <hr/>
                        <div class="row bloco-div desk">
                            <div class="nome">
                                <x-jet-label for="auto_mail" value="{{ __('Autoriza o envio de email?*') }}" />
                                <input type="radio" name="auto_mail" value="s"/> Sim
                                <input type="radio" name="auto_mail" value="n"/> Não
                            </div>
                            <div class="nome">
                                <x-jet-label for="auto_assoc" value="{{ __('Autoriza avisos da Associação?*') }}" />
                                <input type="radio" name="auto_assoc" value="s"/> Sim
                                <input type="radio" name="auto_assoc" value="n" /> Não
                            </div>
                        </div>

                        <hr />
                        <div class="flex items-center justify-end mt-4">

                            <x-jet-button class="ml-4">
                                {{ __('Atualizar') }}
                            </x-jet-button>
                </form>
            </div>
            <!-- FIM DO FORMULARIO -->
    </div>
@stack('javascript')
