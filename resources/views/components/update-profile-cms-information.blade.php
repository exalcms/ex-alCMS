<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Perfil CMS') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Atualize as informações do seu perfil. Alguns dados não podem ser alterados. Se desejar alterar outros dados, solicite a mudança para a Administração do Portal, através do formulário de contato. ') }}
    </x-slot>

    <x-slot name="form">
        <div id="form-register">
            <div class="row bloco-div desk">
                <!-- Name -->
                <div class="nome">
                    <x-jet-label for="name" value="{{ __('Nome Social') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" oninput="handleInput(event)"/>
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
                <!-- Email -->
                <div class="nome">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
            </div>
            <div class="row bloco-div desk">
                <!-- Celular -->
                <div class="nome">
                    <x-jet-label for="celular" value="{{ __('Celular') }}" />
                    <x-jet-input id="celular" type="text" class="mt-1 block w-full" wire:model.defer="state.celular" autocomplete="celular" />
                    <x-jet-input-error for="celular" class="mt-2" />
                </div>
                <!-- Telefone Fixo -->
                <div class="nome">
                    <x-jet-label for="tel_fixo" value="{{ __('Telefone Fixo') }}" />
                    <x-jet-input id="tel_fixo" type="text" class="mt-1 block w-full" wire:model.defer="state.tel_fixo" autocomplete="tel_fixo" />
                    <x-jet-input-error for="tel_fixo" class="mt-2" />
                </div>
            </div>
            <div class="row bloco-div desk">
                <!-- Endereço -->
                <div class="endere">
                    <x-jet-label for="end" value="{{ __('Endereço') }}" />
                    <x-jet-input id="end" type="text" class="mt-1 block w-full" wire:model.defer="state.end" autocomplete="end" oninput="handleInput(event)"/>
                    <x-jet-input-error for="end" class="mt-2" />
                </div>
                <!-- Número -->
                <div class="end_num">
                    <x-jet-label for="num_end" value="{{ __('Número') }}" />
                    <x-jet-input id="num_end" type="text" class="mt-1 block w-full" wire:model.defer="state.num_end" autocomplete="num_end" oninput="handleInput(event)"/>
                    <x-jet-input-error for="num_end" class="mt-2" />
                </div>
            </div>
            <div class="row bloco-div desk">
                <!-- Complemento -->
                <div class="comple">
                    <x-jet-label for="complem_end" value="{{ __('Complemento') }}" />
                    <x-jet-input id="complem_end" type="text" class="mt-1 block w-full" wire:model.defer="state.complem_end" autocomplete="complem_end" oninput="handleInput(event)"/>
                    <x-jet-input-error for="complem_end" class="mt-2" />
                </div>
            </div>
            <div class="row bloco-div desk">
                <!-- CEP -->
                <div class="nome">
                    <x-jet-label for="cep" value="{{ __('CEP') }}" />
                    <x-jet-input id="cep" type="text" class="mt-1 block w-full" wire:model.defer="state.cep" autocomplete="cep" />
                    <x-jet-input-error for="cep" class="mt-2" />
                </div>
                <!-- Bairro -->
                <div class="nome">
                    <x-jet-label for="bairro" value="{{ __('Bairro') }}" />
                    <x-jet-input id="bairro" type="text" class="mt-1 block w-full" wire:model.defer="state.bairro" autocomplete="bairro" oninput="handleInput(event)"/>
                    <x-jet-input-error for="bairro" class="mt-2" />
                </div>
            </div>
            <div class="row bloco-div desk">
                <!-- Cidade -->
                <div class="nome endere">
                    <x-jet-label for="city" value="{{ __('Cidade') }}" />
                    <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" autocomplete="city" oninput="handleInput(event)"/>
                    <x-jet-input-error for="city" class="mt-2" />
                </div>
                <!-- Estado -->
                <div class="nome pais">
                    <x-jet-label for="state" value="{{ __('UF') }}" />
                    <x-jet-input id="state" type="text" class="mt-1 block w-full" wire:model.defer="state.state" autocomplete="state" oninput="handleInput(event)"/>
                    <x-jet-input-error for="state" class="mt-2" />
                </div>
                <!-- País -->
                <div class="nome pais">
                    <x-jet-label for="country" value="{{ __('País') }}" />
                    <x-jet-input id="country" type="text" class="mt-1 block w-full" wire:model.defer="state.country" autocomplete="country" oninput="handleInput(event)"/>
                    <x-jet-input-error for="country" class="mt-2" />
                </div>
            </div>
            <div class="row bloco-div desk">
                <!-- Local de Trabalho -->
                <div class="nome">
                    <x-jet-label for="loc_trab" value="{{ __('Local de Trabalho') }}" />
                    <x-jet-input id="loc_trab" type="text" class="mt-1 block w-full" wire:model.defer="state.loc_trab" autocomplete="loc_trab" oninput="handleInput(event)"/>
                    <x-jet-input-error for="loc_trab" class="mt-2" />
                </div>
                <!-- Telefone Comercial -->
                <div class="nome">
                    <x-jet-label for="tel_com" value="{{ __('Tel Comercial') }}" />
                    <x-jet-input id="tel_com" type="text" class="mt-1 block w-full" wire:model.defer="state.tel_com" autocomplete="tel_com" />
                    <x-jet-input-error for="tel_com" class="mt-2" />
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Salvo.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
