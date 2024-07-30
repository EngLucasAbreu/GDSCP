@extends('login.main')

@section('title', 'NSP - Login')

@section('content')

<div class="login-container">
    <h2 class="">Login</h2>
    <form action="#">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" aria-label="Email">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Senha" aria-label="Senha">
        </div>
        <div class="form-check">
            <input class="form-check-input ms-1 " type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
            </label>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-secondary"><a href="/">Logar</a></button>
        </div>
        <p class="signup-link">Ainda não tem conta? <a href="/signup">Cadastre-se</a></p>
    </form>
</div>

@endsection