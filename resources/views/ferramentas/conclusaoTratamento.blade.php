@extends('layouts.main')

@section('title', 'GDSCP - Conclusão do tratamento')

@section('content')
@include('msg.message')
<div class="container-cad">
    <h3>CONCLUSÃO DO TRATAMENTO</h3>
    <hr>
    <br>
    <form action="{{ route('create-conclusao-tratamento')}}" method="POST">
        @csrf
        <ul class="row form">
            <li class="col-sm-12">
                <label for="conclusaoTratamento">Cadastrar conclusão do tratamento</label>
                <input type="text" id="conclusaoTratamento" name="tipo_tratamento">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar conclusão do tratamento</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DA CONCLUSÃO DO TRATAMENTO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Conclusão do tratamento</th>
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
