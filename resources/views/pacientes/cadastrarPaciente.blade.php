@extends('layouts.main')

@section('title', 'GDSCP - Cadastrar Paciente')

@section('content')
<div class="container-cad">
    <h3>CADASTRAR PACIENTE</h3>
    <hr>
    <br>
    <form action="{{ route('create') }}" method="POST">
        @csrf
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
        <div class="d-flex justify-content-end ">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form
        <br>
        <br>
        <h3>REGISTRAR INCIDENTE</h3>
        <hr>
        <br>
        <ul class="row form">
            <li class="col-sm-2">
                <label for="internacao">Data de Internação</label>
                <input type="date" id="internacao" name="internacao">
            </li>
            <li class="col-sm-2">
                <label for="evento">Data do Evento</label>
                <input type="date" id="evento" name="evento">
            </li>
            <li class="col-sm-4">
                <label for="sala">Sala</label>
                <input type="text" id="sala" name="sala">
            </li>
            <li class="col-sm-4">
                <label for="leito">Leito</label>
                <input type="text" id="leito" name="leito">
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="localLesao">Local de Lesão</label>
                <select id="localLesao" name="localLesao">
                    <option value="1">Cabeça</option>
                    <option value="2">Pescoço</option>
                    <option value="3">Tronco</option>
                    <option value="4">Membros Superiores</option>
                    <option value="5">Membros Inferiores</option>
                </select>
            </li>
            <li class="col-sm">
                <label for="tipoLesao">Tipo de Lesão</label>
                <select id="tipoLesao" name="tipoLesao">
                    <option value="1">Ferida Cirúrgica</option>
                    <option value="2">Úlcera por Pressão</option>
                    <option value="3">Queimadura</option>
                    <option value="4">Outro</option>
                </select>
            </li>
            <li class="col-sm">
                <label for="tratamento">Tipo de Tratamento</label>
                <select id="tratamento" name="tratamento">
                    <option value="1">Curativo</option>
                    <option value="2">Medicamentoso</option>
                    <option value="3">Cirúrgico</option>
                    <option value="4">Outro</option>
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-12">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao">
            </li>
        </ul>
    </form>
</div>
@endsection
