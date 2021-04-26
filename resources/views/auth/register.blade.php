@extends('layouts.excms')
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('site/img/apple-touch-icon.png')}}" width="100" alt="" class="img-fluid" style="margin-top: 100px!important;">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name" value="Nome" />Nome
                <input id="name" type="text" name="name" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Nome Completo') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name_full" :value="old('name_full')" required autofocus autocomplete="name_full" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirme a Senha') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
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
    </x-jet-authentication-card>
</x-guest-layout>
