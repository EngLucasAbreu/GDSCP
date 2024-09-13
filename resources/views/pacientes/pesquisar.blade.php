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
                    <th scope="col">Setor</th>
                    <th scope="col">Leito</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pacientes as $p)
                    <tr>
                        <td>{{$p->nome }}</td>
                        <td>{{date('d/m/Y', strtotime($p->data_internacao))}}</td>
                        <td>{{$p->nome_setor }}</td>
                        <td>{{$p->tipo_leito }}</td>
                        <td>
                            <a href="{{ route('read-evolucao-lesao', ['paciente_id' => $p->id]) }}" class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary d-flex align-items-center">
                                    Visualizar
                                    <ion-icon name="eye-outline" class="ml-2"></ion-icon>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('pacientes.edit', ['paciente_id' => $p->id])}}" class="d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary d-flex align-items-center">
                                    Editar
                                    <ion-icon name="create-outline" class="ml-2"></ion-icon>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('registrar-novo-incidente', ['paciente_id' => $p->id])}}">
                                <button type="button" class="btn btn-primary d-flex align-items-center">
                                    Evoluir
                                    <ion-icon name="clipboard-outline" class="ml-2"></ion-icon>
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
