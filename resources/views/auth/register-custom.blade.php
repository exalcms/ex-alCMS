@extends('layouts.excms')
<x-guest-layout>
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-6 text-gray-500" style="display: flex; justify-content: center;">
        <div class="logocms">
            <img src="{{asset('site/img/apple-touch-icon.png')}}" width="100" alt="" class="img-fluid">
        </div>
    </div>
    <x-jet-validation-errors class="mb-4" />
    <div id="form-register">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- bloco nome -->
            <div class="row bloco-div desk">
                <div class="nome">
                    <x-jet-label for="name_full" value="{{ __('Nome Completo*') }}" />
                    <x-jet-input id="name_full" class="block mt-1 w-full" type="text" name="name_full" :value="old('name_full')" oninput="handleInput(event)" required autofocus autocomplete="name_full" />
                </div>
                <div class="nome">
                    <x-jet-label for="name" value="{{ __('Nome social*') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" oninput="handleInput(event)" />
                </div>
            </div>
                <!-- bloco email/CPF -->
            <div class="row bloco-div desk">
                <div class="nome">
                    <x-jet-label for="email" value="{{ __('Email*') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="nome">
                    <x-jet-label for="cpf" value="{{ __('CPF*') }}" />
                    <x-jet-input id="cpf" class="block mt-1 w-full" type="cpf" name="cpf" :value="old('cpf')" required autofocus placeholder="xxx.xxx.xxx-xx" />
                </div>
            </div>

                <!-- bloco dt_nasc/sexo/assoc/ex-alu/indic -->
            <div class="row bloco-div desk">
                <div class="nome dt-nasc">
                    <x-jet-label for="dtnasc" value="{{ __('Data Nascimento*') }}" />
                    <x-jet-input id="dtnasc" class="block mt-1 w-full" type="text" name="dtnasc" :value="old('dtnasc')" placeholder="dd/mm/aaaa" required  autofocus/>
                </div>
                <div class="nome dt-nasc">
                    <x-jet-label for="sexo" value="{{ __('Gênero*') }}" />
                    <input id="sexo" type="radio" name="sexo" value="m" /> Masculino
                    <input type="radio" name="sexo" value="f"/> Feminino
                </div>
                <div class="nome dt-nasc">
                    <x-jet-label for="assoc" value="{{ __('Associado?*') }}" />
                    <input type="radio" name="assoc" value="s"/> Sim
                    <input type="radio" name="assoc" value="n" /> Não
                </div>
            </div>
            <div class="row bloco-div desk">
                <div class="nome">
                    <x-jet-label for="ex_aluno" value="{{ __('Ex-Aluno?*') }}" />
                    <input type="radio" name="ex_aluno" value="s"/> Sim
                    <input type="radio" name="ex_aluno" value="n"/> Não
                </div>
                <div class="nome">
                    <x-jet-label for="indicado_por" value="{{ __('Ind. por(visitante loja)') }}" />
                    <x-jet-input id="indicado_por" class="block mt-1 w-full" type="text" placeholder="CPF do ex-al" name="indicado_por" :value="old('indicado_por')" />
                </div>
            </div>
                <!-- bloco rg/emissor/celular/tel fixo -->
            <div class="row bloco-div desk">
                <div class="nome">
                    <x-jet-label for="rg" value="{{ __('RG') }}" />
                    <x-jet-input id="rg" class="block mt-1 w-full" type="text" name="rg" :value="old('rg')" placeholder="Apenas números" />
                </div>
                <div class="nome">
                    <x-jet-label for="emissor_rg" value="{{ __('Emissor') }}" />
                    <x-jet-input id="emissor_rg" class="block mt-1 w-full" type="text" name="emissor_rg" :value="old('emissor_rg')" oninput="handleInput(event)" />
                </div>
                <div class="nome">
                    <x-jet-label for="celular" value="{{ __('Celular*') }}" />
                    <x-jet-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" placeholder="Apenas números" required />
                </div>
                <div class="nome">
                    <x-jet-label for="tel_fixo" value="{{ __('Telefone Fixo') }}" />
                    <x-jet-input id="tel_fixo" class="block mt-1 w-full" type="text" name="tel_fixo" :value="old('tel_fixo')" placeholder="Apenas números" />
                </div>
            </div>
                <!-- bloco end -->
            <div class="row bloco-div desk">
                <div class="endere">
                    <x-jet-label for="end" value="{{ __('Endereço*') }}" />
                    <x-jet-input id="end" class="block mt-1 w-full" type="text" name="end" :value="old('end')" required oninput="handleInput(event)" />
                </div>
                <div class="end_num">
                    <x-jet-label for="num_end" value="{{ __('Num.') }}" />
                    <x-jet-input id="num_end" class="block mt-1 w-full" type="text" name="num_end" :value="old('num_end')" />
                </div>
                <div class="comple">
                    <x-jet-label for="complem_end" value="{{ __('Complemento') }}" />
                    <x-jet-input id="complem_end" class="block mt-1 w-full" type="text" name="complem_end" :value="old('complem_end')"  oninput="handleInput(event)" />
                </div>
            </div>
                <!-- bloco Cep -->
            <div class="row bloco-div desk">
                <div class="nome">
                    <x-jet-label for="cep" value="{{ __('CEP*') }}" />
                    <x-jet-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required />
                </div>
                <div class="nome">
                    <x-jet-label for="bairro" value="{{ __('Bairro*') }}" />
                    <x-jet-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" required oninput="handleInput(event)"/>
                </div>
            </div>
            <div class="row bloco-div desk">
                <div class="nome endere">
                    <x-jet-label for="city" value="{{ __('Cidade*') }}" />
                    <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required oninput="handleInput(event)"/>
                </div>
                <div class="nome pais">
                    <x-jet-label for="state" value="{{ __('UF*') }}" />
                    <x-jet-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" maxlength="2" required oninput="handleInput(event)"/>
                </div>
                <div class="nome pais">
                    <x-jet-label for="country" value="{{ __('Pais*') }}" />
                    <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country" maxlength="2" required oninput="handleInput(event)" />
                </div>
            </div>
                <!-- bloco cms -->
            <hr/>
            <div class="row bloco-div desk">
                <div class="nome">
                    <x-jet-label for="nome_guerra" value="{{ __('Nome de guerra') }}" />
                    <x-jet-input id="nome_guerra" class="block mt-1 w-full" type="text" name="nome_guerra" :value="old('nome_guerra')" oninput="handleInput(event)" />
                </div>
                <div class="nome">
                    <x-jet-label for="num_cms" value="{{ __('Número') }}" />
                    <x-jet-input id="num_cms" class="block mt-1 w-full" type="text" name="num_cms" :value="old('num_cms')"/>
                </div>
            </div>
            <div class="row bloco-div desk">
                <div class="nome">
                    <x-jet-label for="ano_ingres" value="{{ __('Ano Ingresso') }}" />
                    <x-jet-input id="ano_ingres" class="block mt-1 w-full" type="text" name="ano_ingres" :value="old('ano_ingres')" maxlength="4"/>
                </div>
                <div class="nome">
                    <x-jet-label for="ano_saida" value="{{ __('Ano saída') }}" />
                    <x-jet-input id="ano_saida" class="block mt-1 w-full" type="text" name="ano_saida" :value="old('ano_saida')" maxlength="4" />
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
                    <x-jet-input id="formacao" class="block mt-1 w-full" type="text" name="formacao" :value="old('formacao')" oninput="handleInput(event)" />
                </div>
                <div class="nome">
                    <x-jet-label for="ocupacao" value="{{ __('Ocupação') }}" />
                    <x-jet-input id="ocupacao" class="block mt-1 w-full" type="text" name="ocupacao" :value="old('ocupacao')" oninput="handleInput(event)" />
                </div>
            </div>
            <div class="row bloco-div desk">
                <div class="nome">
                    <x-jet-label for="loc_trab" value="{{ __('Local de Trabalho') }}" />
                    <x-jet-input id="loc_trab" class="block mt-1 w-full" type="text" name="loc_trab" :value="old('loc_trab')" oninput="handleInput(event)" />
                </div>
                <div class="nome">
                    <x-jet-label for="tel_com" value="{{ __('Tel. Comercial') }}" />
                    <x-jet-input id="tel_com" class="block mt-1 w-full" type="text" name="tel_com" :value="old('tel_com')" />
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
                <div class="row bloco-div desk">
                <!-- bloco senha -->
            <div class="nome">
                <x-jet-label for="password" value="{{ __('Senha*') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="nome">
                <x-jet-label for="password_confirmation" value="{{ __('Confirme a Senha*') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

                </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já tem cadastro?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>
</x-guest-layout>
@stack('javascript')
