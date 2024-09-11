@extends('layouts.main')

@section('title', 'GDSCP - Pesquisar Paciente')

@section('content')
<div class="container-cad">
    <h3>FILTRO DE PESQUISA</h3>
    <hr>
    <br>
    <form action="/pacientes/pesquisar-paciente" method="GET">
        @csrf
        <ul class="row form">
            <li class="col-sm-6">
                <label for="nome" class="ml-2">Nome</label>
                <input type="text" id="nome" name="nome">
            </li>
            <li class="col-sm-6">
                <label for="cpf" class="ml-2">CPF</label>
                <input type="text" id="cpf" name="cpf">
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
                @if (count($pacientes) > 0)
                    @foreach ($pacientes as $p)
                        <tr>
                            <td>{{$p->nome }}</td>
                            <td>{{$p->data_internacao }}</td>
                            <td>{{$p->nome_sala }}</td>
                            <td>{{$p->tipo_leito }}</td>
                            <td>
                                <a href="{{ route('read-evolucao-lesao', ['paciente_id' => $p->id]) }}">
                                    <button type="button" class="btn btn-secondary">
                                        <ion-icon name="eye-outline" class="mr-2"></ion-icon>
                                        Visualizar
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('registrar-novo-incidente', ['paciente_id' => $p->id])}}">
                                    <button type="button" class="btn btn-primary">
                                        <ion-icon name="create-outline" class="mr-2"></ion-icon>
                                        Evoluir
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
