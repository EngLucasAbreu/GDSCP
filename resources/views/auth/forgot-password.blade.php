@extends('login.main')

@section('title', 'GDSCP - Login')

@section('content')

<x-guest-layout>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <div class="login-container">
        <div class="mb-1 text-sm text-gray-600">
            {{ __('Esqueceu sua senha? ') }}
        </div>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos por e-mail um link de redefinição de senha que permitirá que você escolha uma nova.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-group mb-2 d-flex flex-column">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="form-control w-100 rounded" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-2">
                <x-button class="w-100 btn btn-custom mt-4">
                    {{ __('Enviar Link Para Nova Senha') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>

@endsection