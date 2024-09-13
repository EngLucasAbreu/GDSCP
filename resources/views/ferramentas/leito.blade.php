@extends('layouts.main')

@section('title', 'GDSCP - Leito')

@section('content')
<div class="container-cad">
    <h3>LEITO</h3>
    <hr>
    <br>
    <form action="{{ route('create-leito') }}" method="POST">
        @csrf
        <ul class="row form">
            <li class="col-sm-12">
                <label for="leito">Setores Cadastrados</label>
                <select id="setor" name="id_setor">
                    <option value="0" selected>Selecione o Setor</option>
                    @foreach ($setores as $setor)
                        <option value="{{ $setor->id }}">{{ $setor->nome_setor }}</option>
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
                    <th scope="col">Setor</th>
                    <th scope="col">Leitos</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leitos as $leito)
                    <tr>
                        <td>
                            <span id="span-setor-{{ $leito->id }}">{{ $setores->firstWhere('id', $leito->id_setor)->nome_setor ?? 'Desconhecido' }}</span>
                            <select id="select-setor-{{ $leito->id }}" class="form-control d-none">
                                @foreach ($setores as $setor)
                                    <option value="{{ $setor->id }}" {{ $leito->id_setor == $setor->id ? 'selected' : '' }}>
                                        {{ $setor->nome_setor }}
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
        document.getElementById(`span-setor-${leitoId}`).classList.add('d-none');
        document.getElementById(`select-setor-${leitoId}`).classList.remove('d-none');

        document.getElementById(`span-leito-${leitoId}`).classList.add('d-none');
        document.getElementById(`input-leito-${leitoId}`).classList.remove('d-none');

        document.getElementById(`save-btn-${leitoId}`).classList.remove('d-none');
    }

    // Função para salvar a edição do leito
    function salvarLeito(leitoId) {
        let inputNome = document.getElementById(`input-leito-${leitoId}`);
        let novoNome = inputNome.value;

        let selectSetor = document.getElementById(`select-setor-${leitoId}`);
        let idSetor = selectSetor.value;

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

        let setorInput = document.createElement('input');
        setorInput.type = 'hidden';
        setorInput.name = 'id_setor';
        setorInput.value = idSetor;

        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        form.appendChild(nomeInput);
        form.appendChild(setorInput);

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
