@extends('layouts.main')

@section('title', 'GDSCP - Evoluir Paciente')

@section('content')
<div class="container-cad">
    <h3>DADOS DO PACIENTE</h3>
    <hr>
    <br>
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
                    <option value="{{ $e->comorbidade->id }}">{{ $e->comorbidade->tipo_comorbidade}}</option>
                </select>
            </li>
        </ul>
        <br>
        <br>
        <h3>ALTA DO PACIENTE</h3>
        <hr>
        <br>
        <form action="/pacientes" method="POST">
            @csrf
            <ul class="row form">
                <li class="col-sm-6">
                    <label for="data_alta">Data da Alta</label>
                    <input type="date" id="data_alta" name="data_alta">
                </li>
                <li class="col-sm-6">
                    <label for="tipo_alta">Tipo de Alta</label>
                    <select id="tipo_alta" name="tipo_alta">
                        <option value="" selected>Selecione uma opção</option>
                        <option value="alta_melhorada">Alta Melhorada</option>
                        <option value="alta_obito">Alta por Óbito</option>
                        <option value="alta_transferencia">Alta por Transferência</option>
                    </select>
                </li>
            </ul>
            <ul class="row form">
                <li class="col-sm-12 d-flex flex-column">
                    <label for="descricao_alta">Descrição da Alta</label>
                    <textarea type="text" rows="8" cols="100" id="descricao_alta" name="descricao_alta" class="rounded text-area-custom border-light-subtle p-3" required></textarea>
                </li>
            </ul>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Alta do paciente</button>
            </div>
    </form>
</div>
@endsection
