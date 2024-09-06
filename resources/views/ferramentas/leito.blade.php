@extends('layouts.main')

@section('title', 'GDSCP - Leito')

@section('content')
<div class="container-cad">
    <h3>LEITO</h3>
    <hr>
    <br>
    <form action="{{ route('create-leito') }}" method="POST">
        @csrf
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        <ul class="row form">
            <li class="col-sm-12">
                <label for="leito">Salas Cadastradas</label>
                <select id="sala" name="id_sala">
                    <option value="0" selected>Selecione a Sala</option>
                    @foreach ($salas as $sala)
                        <option value="{{ $sala->id }}">{{ $sala->nome_sala }}</option>
                    @endforeach
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-12">
                <label for="leito">Identificação do Leito</label>
                <input type="text" id="leito" name="tipo_leito">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar Leito</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DOS LEITOS</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Sala</th>
                    <th scope="col">Leitos</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leitos as $leito)
                    <tr>
                        <td>
                            <span id="span-sala-{{ $leito->id }}">{{ $salas->firstWhere('id', $leito->id_sala)->nome_sala ?? 'Desconhecido' }}</span>
                            <select id="select-sala-{{ $leito->id }}" class="form-control d-none">
                                @foreach ($salas as $sala)
                                    <option value="{{ $sala->id }}" {{ $leito->id_sala == $sala->id ? 'selected' : '' }}>
                                        {{ $sala->nome_sala }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <span id="span-leito-{{ $leito->id }}">{{ $leito->tipo_leito }}</span>
                            <input type="text" class="form-control d-none" value="{{ $leito->tipo_leito }}" id="input-leito-{{ $leito->id }}">
                        </td>
                        <td>
                            <button class="btn btn-secondary" onclick="editarLeito({{ $leito->id }})">Editar</button>
                            <button class="btn btn-success d-none" id="save-btn-{{ $leito->id }}" onclick="salvarLeito({{ $leito->id }})">Salvar</button>
                        </td>
                        <td>
                            <form action="{{ route('delete-leito', $leito->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    // Função para ativar o modo de edição
    function editarLeito(leitoId) {
        // Oculta os spans e exibe os inputs
        document.getElementById(`span-sala-${leitoId}`).classList.add('d-none');
        document.getElementById(`select-sala-${leitoId}`).classList.remove('d-none');

        document.getElementById(`span-leito-${leitoId}`).classList.add('d-none');
        document.getElementById(`input-leito-${leitoId}`).classList.remove('d-none');

        document.getElementById(`save-btn-${leitoId}`).classList.remove('d-none');
    }

    // Função para salvar a edição do leito
    function salvarLeito(leitoId) {
        let inputNome = document.getElementById(`input-leito-${leitoId}`);
        let novoNome = inputNome.value;

        let selectSala = document.getElementById(`select-sala-${leitoId}`);
        let idSala = selectSala.value;

        // Cria um formulário para enviar os dados
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = `/ferramentas/update-leito/${leitoId}`;

        let csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}'; // Token CSRF do Laravel

        let methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'PUT'; // Método PUT para edição

        let nomeInput = document.createElement('input');
        nomeInput.type = 'hidden';
        nomeInput.name = 'tipo_leito';
        nomeInput.value = novoNome;

        let salaInput = document.createElement('input');
        salaInput.type = 'hidden';
        salaInput.name = 'id_sala';
        salaInput.value = idSala;

        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        form.appendChild(nomeInput);
        form.appendChild(salaInput);

        document.body.appendChild(form);
        form.submit();
    }

    // Oculta o alerta de sucesso após 5 segundos
    setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 5000); // 5000 milissegundos = 5 segundos
</script>
@endsection
