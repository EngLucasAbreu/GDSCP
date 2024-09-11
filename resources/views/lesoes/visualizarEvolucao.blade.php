@extends('layouts.main')

@section('title', 'GDSCP - Visualizar Paciente')

@section('content')

<style>
    .btn-custom {
    background-color: #e30505;
    color: #ffffff
    }

    .btn-custom:hover {
    background-color: #be0303;
    color: #ffffff
}
</style>
<div class="container-cad">
    <h3>DADOS DO PACIENTE</h3>
    <hr>
    <br>
    <form action="/pacientes" method="POST">
        @csrf
        <ul class="row form">
            <li class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="{{ $e->nome }}" disabled>
            </li>
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento" value="{{ $e->data_nascimento }}" disabled>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" value="{{ $e->cpf }}" disabled>
            </li>
            <li class="col-sm">
                <label for="cns">CNS</label>
                <input type="text" id="cns" name="cns" value="{{ $e->cns }}" disabled>
            </li>
            <li class="col-sm">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" disabled>
                    @if ($e->sexo == 'F')
                    <option value="{{ $e->sexo}}">Feminino</option>
                    @elseif ($e->sexo == 'M')
                    <option value="{{ $e->sexo}}">Masculino</option>
                    @elseif ($e->sexo == 'O')
                    <option value="{{ $e->sexo}}">Outro</option>
                    @else
                    <option value="{{ $e->sexo}}">Prefiro não informar</option>

                    @endif
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-4">
                <label for="comorbidade">Comorbidade</label>
                <select id="comorbidade" name="comorbidade" disabled>
                    <option value="{{ $e->comorbidade->tipo_comorbidade }}" selected >{{ $e->comorbidade->tipo_comorbidade }}</option>
                </select>
            </li>
        </ul>
    </form>
        <div class="text-right">
            <a href="{{ route('alta-paciente', ['paciente_id' => $e->id])}}">
                <button type="submit" class="btn btn-custom mr-2">DAR ALTA AO PACIENTE</button>
            </a>
            <a href="{{ route('registrar-novo-incidente', ['paciente_id' => $e->id])}}">
                <button type="submit" class="btn btn-primary">NOVO INCIDENTE</button>
            </a>
        </div>
        <br>
        <br>
        <h3>EVENTOS</h3>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Data de internação</th>
                    <th scope="col">Data do evento</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Leito</th>
                    <th scope="col">Local de Lesão</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evolucao as $e)
                <tr>
                    <td>{{date('d/m/Y', strtotime($e->statusPaciente->data_internacao))}}</td>
                    <td>{{ $e->incidente->data_evento }}</td>
                    <td>{{ $e->leito->sala->nome_sala }}</td>
                    <td>{{ $e->leito->tipo_leito }}</td>
                    <td>{{ $e->incidente->lesao->localLesao->regiao_lesao  }} </td>
                    <td>
                        <a href="{{ route('read-incidente-lesao', ['paciente_id' => $e->id_paciente, 'incidente_id' => $e->id_incidente]) }}">
                            <button type="button" class="btn btn-secondary">
                            <ion-icon name="eye-outline" class="mr-2"></ion-icon>
                                Visualizar
                            </button>
                        </a>
                    </td>
                @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection
