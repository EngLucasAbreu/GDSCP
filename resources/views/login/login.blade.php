@extends('login.main')

@section('title', 'NSP - Login')

@section('content')

<div class="login-container">
    <h2 class="d-flex justify-content-center mb-4">Login</h2>
    <form action="#" method="post">
        <div class="input-group mb-3 d-flex flex-column">
            <input type="text" class="form-control w-100" name="email" value="lucas@lucas.com" placeholder="Email" aria-label="Email">
        </div>
        <div class="input-group mb-3 d-flex flex-column">
            <input type="password" class="form-control w-100" name="password" value="12345678" placeholder="Senha" aria-label="Senha">
        </div>
        <div class="form-check">
            <input class="form-check-input ms-1 " type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Mantenha-me logado
            </label>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-center">
            <button type="submit" class="w-100 btn btn-secondary mt-4">Logar</button>
        </div>
        <p class="d-flex justify-content-center mt-4 signup-link">Ainda não tem conta? <a href="/signup">Cadastre-se</a></p>
    </form>
</div>

@endsection