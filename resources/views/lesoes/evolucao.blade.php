@extends('layouts.main')

@section('title', 'GDSCP - Evolução')

@section('content')
<div class="container-cad">
    <h3>FILTRO DE PESQUISA</h3>
    <hr>
    <br>
    <form action="/pacientes" method="GET">
        <ul class="row form">
            <li class="col-sm-6">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome">
            </li>
            <li class="col-sm-4">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf">
            </li>
            <li class="col-sm-2">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento">
            </li>
        </ul>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">PESQUISAR</button>
        </div>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRAR EVOLUÇÃO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Pacientes</th>
                    <th scope="col">Data de Internação</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Leito</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evolucoes as $evolucao)
                    <tr>
                        <td>{{$evolucao->paciente->nome}}</td>
                        <td>{{$evolucao->incidente->data_internacao}}</td>
                        <td>{{$evolucao->leito->sala->nome_sala}}</td>
                        <td>{{$evolucao->leito->tipo_leito}}</td>
                        <td>
                            <a href="{{ route('read-evolucao-lesao', ['paciente_id' => $evolucao->paciente->id]) }}">
                                <button type="button" class="btn btn-secondary">
                                    <ion-icon name="eye-outline"></ion-icon>
                                    Visualizar
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('read-evolucao-lesao', ['paciente_id' => $evolucao->paciente->id]) }}">
                                <button type="button" class="btn btn-primary">
                                <ion-icon name="create-outline"></ion-icon>
                                    Evoluir
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
