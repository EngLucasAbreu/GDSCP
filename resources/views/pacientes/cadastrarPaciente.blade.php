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
                <select id="comorbidade" name="id_comorbidade" required> <!-- O nome do campo deve ser 'id_comorbidade' -->
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($comorbidades as $comorbidade)
                        <option value="{{$comorbidade->id}}">{{$comorbidade->tipo_comorbidade}}</option> <!-- O valor deve ser o ID da comorbidade -->
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
                <select id="sala" name="sala" required>
                    <option value="" selected>Selecione uma opção</option>
                    @foreach($salas as $sala)
                        <option value="{{$sala->id}}">{{$sala->nome_sala}}</option>
                    @endforeach
                </select>
            </li>
            <li class="col-sm-4">
                <label for="leito">Leito</label>
                <select id="leito" name="leito" required disabled>
                    <option value="" selected>Selecione uma sala primeiro</option>
                </select>
            </li>

        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="localLesao">Local de Lesão</label>
                <select id="localLesao" name="local_lesao" required> <!-- Alterado para enviar a região da lesão -->
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($locais as $local)
                        <option value="{{$local->regiao_lesao}}">{{$local->regiao_lesao}}</option> <!-- Captura a região, não o ID -->
                    @endforeach
                </select>
            </li>
            <li class="col-sm">
                <label for="tipoLesao">Tipo de Lesão</label>
                <select id="tipoLesao" name="tipo_lesao" required> <!-- Alterado o nome do campo -->
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->descricao_lesao}}">{{$tipo->descricao_lesao}}</option> <!-- Captura a descrição, não o ID -->
                    @endforeach
                </select>
            </li>
            <li class="col-sm">
                <label for="tratamento">Tipo de Tratamento</label>
                <select id="tratamento" name="tipo_tratamento" required> <!-- Certifique-se de que o campo nome está correto -->
                    <option value="" selected>Selecione uma opção</option>
                    @foreach ($tratamentos as $tratamento)
                        <option value="{{$tratamento->tipo_tratamento}}">{{$tratamento->tipo_tratamento}}</option> <!-- Certifique-se de que está capturando o tipo, não o ID -->
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
<!-- Link para o jQuery completo com suporte a AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        // Desabilitar o campo de leitos inicialmente
        $('#leito').prop('disabled', true);

        // Captura quando a sala é selecionada
        $('#sala').on('change', function() {
            var salaId = $(this).val(); // Pega o ID da sala selecionada

            // Limpa os leitos previamente selecionados
            $('#leito').empty().append('<option value="" selected>Selecione uma opção</option>');
            $('#leito').prop('disabled', true); // Desabilita enquanto faz a requisição

            if (salaId) {
                // Faz a requisição AJAX para buscar os leitos da sala selecionada
                $.ajax({
                    url: '/get-leitos/' + salaId,  // Chama a rota criada
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                    console.log(data);
                        // Verifica se retornou algum leito
                        if (data.length > 0) {
                            $('#leito').prop('disabled', false); // Habilita o campo de leitos

                            // Popula o campo com os leitos retornados
                            $.each(data, function(key, leito) {
                                $('#leito').append('<option value="'+ leito.id +'">'+ leito.tipo_leito +'</option>');
                            });
                        } else {
                            $('#leito').append('<option value="" selected>Nenhum leito disponível</option>');
                        }
                    },
                    error: function() {
                        alert('Erro ao buscar leitos. Tente novamente.');
                    }
                });
            }
        });
    });
</script>


@endsection
