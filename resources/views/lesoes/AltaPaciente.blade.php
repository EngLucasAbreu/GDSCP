@extends('layouts.main')

@section('title', 'GDSCP - Evoluir Paciente')

@section('content')
<div class="container-cad">
    <h3>DADOS DO PACIENTE</h3>
    <hr>
    <br>
    <form action="/pacientes" method="POST">
        <ul class="row form">
            <li class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome">
            </li>
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento">
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf">
            </li>
            <li class="col-sm">
                <label for="cns">CNS</label>
                <input type="text" id="cns" name="cns">
            </li>
            <li class="col-sm">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                    <option value="N">Prefiro não informar</option>
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-4">
                <label for="comorbidade">Comorbidade</label>
                <select id="comorbidade" name="comorbidade">
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </li>
        </ul>
        <br>
        <br>
        <h3>ALTA DO PACIENTE</h3>
        <hr>
        <br>
        <ul class="row form">
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento">
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-12">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao">
            </li>
        </ul>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Registrar novo incidente</button>
        </div>
    </form>
</div>
@endsection
