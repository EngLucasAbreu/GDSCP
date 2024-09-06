@extends('layouts.main')

@section('title', 'GDSCP - Evolução do tratamento')

@section('content')
@include('msg.message')
<div class="container-cad">
    <h3>EVOLUÇÃO DO TRATAMENTO</h3>
    <hr>
    <br>
    <form action="{{ route('create-evolucao-tratamento')}}" method="POST">
        @csrf
        <ul class="row form">
            <li class="col-sm-12">
                <label for="evolucaoTratamento">Cadastrar evolução do tratamento</label>
                <input type="text" id="evolucaoTratamento" name="tipo_tratamento">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar evolução do tratamento</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DA EVOLUÇÃO DO TRATAMENTO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Evolução do tratamento</th>
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
