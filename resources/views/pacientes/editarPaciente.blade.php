@extends('layouts.main')

@section('title', 'GDSCP - Cadastrar Paciente')

@section('content')
<div class="container-cad">
    <h3>EDITAR PACIENTE</h3>
    <hr>
    <br>
    <form action="{{ route('pacientes.update', ['paciente_id' => $paciente_id])}}" method="PUT">
        @csrf  {{-- Codigo de segurança para formulário, todos devem conter --}}
        <ul class="row form">
            <li class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="{{ $p->nome }}" required>
            </li>
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento" value="{{ $p->data_nascimento }}" required>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" value="{{ $p->cpf }}" required>
            </li>
            <li class="col-sm">
                <label for="cns">CNS</label>
                <input type="text" id="cns" name="cns" value="{{ $p->cns }}" required>
            </li>
            <li class="col-sm">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
                @if ($p->sexo == 'M')
                    <option value="M" selected>Masculino</option>
                @elseif ($p->sexo == 'F')
                    <option value="F" selected>Feminino</option>
                @elseif ($p->sexo == 'O')
                    <option value="O" selected>Outro</option>
                @else
                    <option value="N" selected>Prefiro não informar</option>
                @endif
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
                <select id="comorbidade" name="id_comorbidade"> <!-- O nome do campo deve ser 'id_comorbidade' -->
                    <option value='{{ $p->comorbidade->id}}' selected>{{ $p->comorbidade->tipo_comorbidade}}</option>
                    @foreach ($comorbidades as $c)
                        <option value="{{$c->id}}">{{$c->tipo_comorbidade}}</option> <!-- O valor deve ser o ID da comorbidade -->
                    @endforeach
                </select>
            </li>
            <li class="col-sm-4">
                <label for="setor">Setor</label>
                <select id="setor" name="setor" required>
                    <option value="{{ $l->setor->id }}" selected>{{ $l->setor->nome_setor }}</option>
                    @foreach($setores as $setor)
                    @if (!($setor->id == $l->setor->id))
                        <option value="{{$setor->id}}">{{$setor->nome_setor}}</option>
                    @endif
                    @endforeach
                </select>
            </li>
            <li class="col-sm-4">
                <label for="leito">Leito</label>
                <select id="leito" name="leito" required>
                    <option value="{{ $l->id }}" selected>{{ $l->tipo_leito }}</option>
                    @foreach ( $leitos as $leito )
                    @if (!($leito->id == $l->id))
                        <option value="{{ $leito->tipo_leito }}">{{ $leito->tipo_leito }}</option>
                    @endif
                    @endforeach
                </select>
            </li>

        </ul>
        <div class="d-flex justify-content-end ">
            <button type="submit" class="btn btn-primary">Editar Paciente</button>
        </div>
    </form>
</div>
<!-- Link para o jQuery completo com suporte a AJAX -->
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
