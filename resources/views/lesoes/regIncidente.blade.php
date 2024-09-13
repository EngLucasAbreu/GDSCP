@extends('layouts.main')

@section('title', 'GDSCP - Cadastrar Paciente')

@section('content')
<div class="container-cad">
    <h3>EVOLUIR PACIENTE</h3>
    <hr>
    <br>
        <ul class="row form">
            <li class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="{{$evolucao->paciente->nome}}" disabled required>
            </li>
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento" value="{{$evolucao->paciente->data_nascimento}}" disabled required>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" placeholder="{{$evolucao->paciente->cpf}}" disabled required>
            </li>
            <li class="col-sm">
                <label for="cns">CNS</label>
                <input type="text" id="cns" name="cns" placeholder="{{$evolucao->paciente->cns}}" disabled required>
            </li>
            <li class="col-sm">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" disabled required>
                    <option value="{{$evolucao->paciente->sexo}}">
                        @if ($evolucao->paciente->sexo == 'M')
                            Masculino
                        @elseif ($evolucao->paciente->sexo == 'F')
                            Feminino
                        @elseif ($evolucao->paciente->sexo == 'O')
                            Outro
                        @else
                            Prefiro não informar
                        @endif
                    </option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                    <option value="P">Prefiro não informar</option>
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-4">
                <label for="comorbidade">Comorbidade</label>
                <select id="comorbidade" name="id_comorbidade" disabled required> <!-- O nome do campo deve ser 'id_comorbidade' -->
                    <option value="{{$evolucao->paciente->comorbidade->tipo_comorbidade}}" selected>{{$evolucao->paciente->comorbidade->tipo_comorbidade}}</option>
                </select>
            </li>
        </ul>
        <br>
        <br>
        <h3>REGISTRAR INCIDENTE</h3>
        <hr>
        <br>
        <form action="{{ route('create-evolucao-lesao')}}" method="POST">
            @csrf  {{-- Codigo de segurança para formulário, todos devem conter --}}
            <ul class="row form">
                <li class="col-sm-2">
                    <label for="internacao">Data de Internação</label>
                    <input type="date" id="internacao" name="internacao" value="{{$evolucao->incidente->data_internacao}}" readonly required>
                </li>
                <li class="col-sm-2">
                    <label for="evento">Data do Evento</label>
                    <input type="date" id="evento" name="evento" required>
                </li>
                <li class="col-sm-4">
                    <label for="setor">Setor</label>
                    <select type="text" id="setor" name="setor" required>
                        <option value="{{ $evolucao->leito->setor->nome_setor }}" selected>{{ $evolucao->leito->setor->nome_setor }}</option>
                        @foreach($setores as $setor)
                            <option value="{{$setor->id}}">{{$setor->nome_setor}}</option>
                        @endforeach
                    </select>
                </li>
                <li class="col-sm-4">
                    <label for="leito">Leito</label>
                    <select type="text" id="leito" name="leito" required>
                        <option value="{{ $evolucao->leito->tipo_leito }}" selected>{{ $evolucao->leito->tipo_leito }}</option>
                        @foreach($leitos as $leito)
                            <option value="{{$leito->id}}">{{$leito->tipo_leito}}</option>
                        @endforeach
                    </select>
                </li>
            </ul>
            <ul class="row form">
                <li class="col-sm">
                    <label for="localLesao">Local de Lesão</label>
                    <select id="localLesao" name="local_lesao" required> <!-- Alterado para enviar a região da lesão -->
                        <option value="{{ $evolucao->incidente->lesao->localLesao->regiao_lesao}}" selected>{{ $evolucao->incidente->lesao->localLesao->regiao_lesao}}</option>
                        @foreach ($locais as $local)
                            <option value="{{$local->regiao_lesao}}">{{$local->regiao_lesao}}</option> <!-- Captura a região, não o ID -->
                        @endforeach
                    </select>
                </li>
                <li class="col-sm">
                    <label for="tipoLesao">Tipo de Lesão</label>
                    <select id="tipoLesao" name="tipo_lesao" required> <!-- Alterado o nome do campo -->
                        <option value="{{ $evolucao->incidente->lesao->tipoLesao->descricao_lesao}}" selected>{{ $evolucao->incidente->lesao->tipoLesao->descricao_lesao}}</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->descricao_lesao}}">{{$tipo->descricao_lesao}}</option> <!-- Captura a descrição, não o ID -->
                        @endforeach
                    </select>
                </li>
                <li class="col-sm">
                    <label for="tratamento">Tipo de Tratamento</label>
                    <select id="tratamento" name="tipo_tratamento" required> <!-- Certifique-se de que o campo nome está correto -->
                        <option value="{{ $evolucao->incidente->tratamento->tipo_tratamento}}" selected>{{ $evolucao->incidente->tratamento->tipo_tratamento}}</option>
                        @foreach ($tratamentos as $tratamento)
                            <option value="{{$tratamento->tipo_tratamento}}">{{$tratamento->tipo_tratamento}}</option> <!-- Certifique-se de que está capturando o tipo, não o ID -->
                        @endforeach
                    </select>
                </li>
            </ul>
            <ul class="row form">
                <li class="col-sm-12 d-flex flex-column">
                    <label for="descricao">Descrição</label>
                    <textarea type="text" rows="8" cols="100" id="descricao" name="descricao" class="rounded text-area-custom border-light-subtle p-3" required></textarea>
                </li>
            </ul>
            <div class="d-flex justify-content-end ">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
</div>
@endsection
