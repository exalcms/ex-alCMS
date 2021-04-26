<x-guest-layout>

    <x-jet-authentication-card>
        <div class="mt-6 text-gray-500" style="display: flex; justify-content: center;">
            <div class="logocms">
                <img src="{{asset('site/img/apple-touch-icon.png')}}" width="100" alt="" class="img-fluid">
            </div>
        </div>

        <div class="mb-4 mt-5 text-sm text-gray-600">
            {{ __('Obrigado por inscrever-se em nosso site! Antes de começar, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Se você não recebeu o e-mail, teremos o prazer de enviar outro.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Um novo link de verificação foi enviado para o endereço de e-mail fornecido durante o registro.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Reenviar email de verificação') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
