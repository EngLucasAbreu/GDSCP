@extends('layouts.main')

@section('title', 'GDSCP - Tipo do tratamento')

@section('content')
@include('msg.message')
<div class="container-cad">
    <h3>TIPO DO TRATAMENTO</h3>
    <hr>
    <br>
    <form action="{{ route('create-tipo-tratamento') }}" method="POST">
        @csrf
        <ul class="row form">
            <li class="col-sm-12">
                <label for="tipoTratamento">Tipo evolução do tratamento</label>
                <input type="text" id="tipoTratamento" name="tipo_tratamento">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar tipo do tratamento</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DA TIPO DO TRATAMENTO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tipo do tratamento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tratamentos as $tratamento)
                <tr>
                    <td>{{ $tratamento->tipo_tratamento }}</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
