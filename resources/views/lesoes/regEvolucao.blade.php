@extends('layouts.main')

@section('title', 'GDSCP - Evoluir Paciente')

@section('content')
@include('msg.message')
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
                    <option value="{{ $e->comorbidade->tipo_comorbidade }}">{{ $e->comorbidade->tipo_comorbidade }}</option>
                </select>
            </li>
        </ul>
        <br>
        <br>
        <h3>REGISTRAR NOVO INCIDENTE</h3>
        <hr>
        <br>
        <form action="{{ route('incidente.store', ['paciente_id' => $e->id, 'leito_id' => $i->id ]) }}" method="POST">
            @csrf
            <ul class="row form">
                <li class="col-sm-2">
                    <label for="internacao">Data de Internação</label>
                    <input type="text" id="internacao" name="internacao" value="{{date('d/m/Y', strtotime($s->data_internacao))}}" disabled required>
                </li>
                <li class="col-sm-2">
                    <label for="evento">Data do Evento</label>
                    <input type="date" id="evento" name="evento" required>
                </li>
                <li class="col-sm-4">
                    <label for="setor">Setor</label>
                    <select id="setor" name="setor" disabled required>
                        <option selected >{{ $i->setor->nome_setor}}</option>
                        @foreach($setores as $setor)
                            <option value="{{$setor->id}}">{{$setor->nome_setor}}</option>
                        @endforeach
                    </select>
                </li>
                <li class="col-sm-4">
                    <label for="leito">Leito</label>
                    <select id="leito" name="leito" required disabled>
                        <option selected>{{ $i->tipo_leito}}</option>
                    </select>
                </li>

            </ul>
            <ul class="row form">
                <li class="col-sm">
                    <label for="localLesao">Local de Lesão</label>
                    <select id="localLesao" name="local_lesao" required> <!-- Alterado para enviar a região da lesão -->
                        <option value="" selected>Selecione uma opção</option>
                        @foreach ($locais as $local)
                            <option value="{{$local->id}}">{{$local->regiao_lesao}}</option> <!-- Captura a região, não o ID -->
                        @endforeach
                    </select>
                </li>
                <li class="col-sm">
                    <label for="tipoLesao">Tipo de Lesão</label>
                    <select id="tipoLesao" name="tipo_lesao" required> <!-- Alterado o nome do campo -->
                        <option value="" selected>Selecione uma opção</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descricao_lesao}}</option> <!-- Captura a descrição, não o ID -->
                        @endforeach
                    </select>
                </li>
                <li class="col-sm">
                    <label for="tratamento">Tipo de Tratamento</label>
                    <select id="tratamento" name="tipo_tratamento" required> <!-- Certifique-se de que o campo nome está correto -->
                        <option value="" selected>Selecione uma opção</option>
                        @foreach ($tratamentos as $tratamento)
                            <option value="{{$tratamento->id}}">{{$tratamento->tipo_tratamento}}</option> <!-- Certifique-se de que está capturando o tipo, não o ID -->
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
            <div class="text-right">
                <a href="{{ route('read-evolucao-lesao', ['paciente_id' => $e->id]) }}">
                    <button type="submit" class="btn btn-primary">Registrar novo incidente</button>
                </a>

            </div>
        </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#setor').on('change', function() {
            var setorId = $(this).val(); // Pega o ID da setor selecionada

            // Limpa e desabilita o campo de leitos antes de fazer a requisição
            $('#leito').empty().append('<option value="" selected>Selecione uma opção</option>');
            $('#leito').prop('disabled', true);

            if (setorId) {
                // Faz a requisição AJAX
                $.ajax({
                    url: '/get-leitos/' + setorId,  // URL da requisição com o ID da setor
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Verifica se recebeu dados
                        if (data.length > 0) {
                            $('#leito').prop('disabled', false); // Habilita o campo de leitos

                            // Popula o campo de seleção com os leitos recebidos
                            $.each(data, function(key, leito) {
                                $('#leito').append('<option value="'+ leito.id +'">'+ leito.tipo_leito +'</option>');
                            });
                        } else {
                            $('#leito').append('<option value="" selected>Nenhum leito disponível</option>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erro na requisição AJAX: " + textStatus, errorThrown);
                        console.log(jqXHR.responseText); // Para exibir a mensagem de erro vinda do servidor
                        alert('Erro ao buscar leitos. Tente novamente mais tarde.');
                    }
                });
            }
        });
    });

</script>
@endsection
