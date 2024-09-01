@extends('login.main')

@section('title', 'GDSCP - Login')

@section('content')

<x-guest-layout>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="login-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="input-group mb-3 d-flex flex-column">
                <x-label for="name" :value="__('Nome Completo')" />

                <x-input id="name" class="form-control w-100 rounded" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="input-group mb-3 d-flex flex-column">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="form-control w-100 rounded" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="input-group mb-3 d-flex flex-column">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="form-control w-100 rounded"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="input-group mb-3 d-flex flex-column">
                <x-label for="password_confirmation" :value="__('Confirmar Senha')" />

                <x-input id="password_confirmation" class="form-control w-100 rounded"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já Possui Registro?') }}
                </a>

                <x-button class="w-100 btn btn-custom mt-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>

@endsection