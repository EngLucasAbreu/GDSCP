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
                <input type="text" id="nome" name="nome" value="{{ $e->nome}}" disabled>
            </li>
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento" value="{{ $e->data_nascimento}}" disabled>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" value="{{ $e->cpf}}" disabled>
            </li>
            <li class="col-sm">
                <label for="cns">CNS</label>
                <input type="text" id="cns" name="cns" value="{{ $e->cns}}" disabled>
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
                    <option value="{{ $e->comorbidade->tipo_comorbidade }}">{{ $e->comorbidade->tipo_comorbidade }}</option>
                </select>
            </li>
        </ul>
        <br>
        <br>
        <h3>VISUALIZAR INCIDENTE</h3>
        <hr>
        <br>
        <ul class="row form">
            <li class="col-sm-2">
                <label for="internacao">Data de Internação</label>
                <input type="date" id="internacao" name="internacao" value="{{ $i->data_internacao}}" disabled>
            </li>
            <li class="col-sm-2">
                <label for="evento">Data do Evento</label>
                <input type="date" id="evento" name="evento" value="{{ $i->data_evento}}" disabled>
            </li>
            <li class="col-sm-4">
                <label for="sala">Sala</label>
                <input type="text" id="sala" name="sala" value="{{ $l->sala->nome_sala}}" disabled>
            </li>
            <li class="col-sm-4">
                <label for="leito">Leito</label>
                <input type="text" id="leito" name="leito" value="{{ $l->tipo_leito}}" disabled>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="localLesao">Local de Lesão</label>
                <select id="localLesao" name="localLesao" disabled>
                    <option value="{{ $i->lesao->localLesao->regiao_lesao }}">{{ $i->lesao->localLesao->regiao_lesao }}</option>

                </select>
            </li>
            <li class="col-sm">
                <label for="tipoLesao">Tipo de Lesão</label>
                <select id="tipoLesao" name="tipoLesao" disabled>
                    <option value="{{ $i->lesao->tipoLesao->descricao_lesao }}">{{ $i->lesao->tipoLesao->descricao_lesao }}</option>
                </select>
            </li>
            <li class="col-sm">
                <label for="tratamento">Tipo de Tratamento</label>
                <select id="tratamento" name="tratamento" disabled>
                    <option value="{{ $i->tratamento->tipo_tratamento }}">{{ $i->tratamento->tipo_tratamento }}</option>
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-12">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" value="{{ $i->descricao }}" disabled>
            </li>
        </ul>
        <div class="text-right">
            <a href="{{ route('read-evolucao-lesao', ['paciente_id' => $e->id]) }}">
                <button type="submit" class="btn btn-primary">Voltar</button>
            </a>
        </div>
</div>

@endsection
