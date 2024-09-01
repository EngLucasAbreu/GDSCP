@extends('login.main')

@section('title', 'GDSCP - Login')

@section('content')

<div class="login-container">
    <h2 class="d-flex justify-content-center mb-4">Cadastrar</h2>
    <form action="#">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nome" aria-label="Nome">
        </div>    
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" aria-label="Email">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Senha" aria-label="Senha">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Confirmar Senha" aria-label="Confirmar Senha">
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-center">
            <button type="submit" class="w-100 mt-1 p-2 btn btn-secondary">Cadastrar</button>
        </div>
    </form>
</div>

@endsection