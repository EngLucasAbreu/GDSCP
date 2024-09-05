@extends('layouts.main')

@section('title', 'GDSCP - Cadastrar Paciente')

@section('content')
@include('msg.message')
<div class="container-cad">
    <h3>CADASTRAR PACIENTE</h3>
    <hr>
    <br>
    <form action="/pacientes/store" method="POST">
        @csrf  {{-- Codigo de segurança para formulário, todos devem conter --}}
        <ul class="row form">
            <li class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </li>
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento" required>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required>
            </li>
            <li class="col-sm">
                <label for="cns">CNS</label>
                <input type="text" id="cns" name="cns" required>
            </li>
            <li class="col-sm">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
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
                <select id="comorbidade" name="id_comorbidade">
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($comorbidades as $comorbidade)
                        <option value="{{$comorbidade->id}}">{{$comorbidade->tipo_comorbidade}}</option>
                    @endforeach
                </select>
            </li>
        </ul>
        <br>
        <br>
        <h3>REGISTRAR INCIDENTE</h3>
        <hr>
        <br>
        <ul class="row form">
            <li class="col-sm-2">
                <label for="internacao">Data de Internação</label>
                <input type="date" id="internacao" name="internacao" required>
            </li>
            <li class="col-sm-2">
                <label for="evento">Data do Evento</label>
                <input type="date" id="evento" name="evento" required>
            </li>
            <li class="col-sm-4">
                <label for="sala">Sala</label>
                <select type="text" id="sala" name="sala" required>
                    <option value="" selected>Selecione uma opção</option>
                    @foreach($salas as $sala)
                        <option value="{{$sala->id}}">{{$sala->nome_sala}}</option>
                    @endforeach
                </select>
            </li>
            <li class="col-sm-4">
                <label for="leito">Leito</label>
                <select type="text" id="leito" name="leito" required>
                    <option value="" selected>Selecione uma opção</option>
                    @foreach($leitos as $leito)
                        <option value="{{$leito->id}}">{{$leito->tipo_leito}}</option>
                    @endforeach
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="localLesao">Local de Lesão</label>
                <select id="localLesao" name="id_lesao" required>
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($locais as $local)
                        <option value="{{$local->id}}">{{$local->local_lesao}}</option>
                    @endforeach

                </select>
            </li>
            <li class="col-sm">
                <label for="tipoLesao">Tipo de Lesão</label>
                <select id="tipoLesao" name="tipo_lesao" required>
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->tipo_lesao}}</option>
                    @endforeach
                </select>
            </li>
            <li class="col-sm">
                <label for="tratamento">Tipo de Tratamento</label>
                <select id="tratamento" name="id_tratamento" required>
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($tratamentos as $tratamento)
                        <option value="{{$tratamento->id}}">{{$tratamento->tipo_tratamento}}</option>
                    @endforeach
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-12">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" required>
            </li>
        </ul>
        <div class="d-flex justify-content-end ">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
@endsection
