@extends('login.main')

@section('title', 'NSP - Login')

@section('content')

<x-guest-layout>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    
    <div class="login-container">
        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-group mb-3 d-flex flex-column">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="form-control w-100 rounded" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div  class="input-group mb-3 d-flex flex-column">
            <x-label for="password" :value="__('Senha')" />

            <x-input id="password" class="form-control w-100 rounded"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Mantenha-me Logado') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 d-flex justify-content-center" href="{{ route('password.request') }}">
                    {{ __('Esqueci minha senha') }}
                </a>
            @endif

            <x-button class="w-100 btn btn-custom mt-4">
                {{ __('Entrar') }}
            </x-button>
        </div>
        </form>
    </div>
</x-guest-layout>

@endsection