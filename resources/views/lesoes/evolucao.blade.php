@extends('layouts.main')

@section('title', 'GDSCP - Evolução')

@section('content')
<div class="container-cad">
    <h3>FILTRO DE PESQUISA</h3>
    <hr>
    <br>
    <form action="{{ route('lesoes.pesquisar-lesao')}}" method="GET">
        @csrf
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
                    <th scope="col">Setor</th>
                    <th scope="col">Leito</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $p)
                <tr>
                    <td>{{$p->nome}}</td>
                    <td>{{date('d/m/Y', strtotime($p->data_internacao))}}</td>
                    <td>{{$p->nome_setor}}</td>
                    <td>{{$p->tipo_leito}}</td>
                    <td>
                        <a href="{{ route('read-evolucao-lesao', ['paciente_id' => $p->id]) }}">
                            <button type="button" class="btn btn-secondary">
                                <ion-icon name="eye-outline" class="mr-2"></ion-icon>
                                Visualizar
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('read-evolucao-lesao', ['paciente_id' => $p->id]) }}">
                            <button type="button" class="btn btn-primary">
                                <ion-icon name="create-outline" class="mr-2"></ion-icon>
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
