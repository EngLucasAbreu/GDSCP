@extends('layouts.main')

@section('title', 'GDSCP - Registrar Incidente')

@section('content')
<div class="container-cad">
    <h3>CADASTRAR PACIENTE</h3>
    <hr>
    <br>
    <form action="{{ route('create') }}" method="POST">
        @csrf
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
