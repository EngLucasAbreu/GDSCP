@extends('layouts.main')

@section('title', 'GDSCP - Tipo do tratamento')

@section('content')
@include('msg.message')
<div class="container-cad">
    <h3>TIPO DO TRATAMENTO</h3>
    <hr>
    <br>
    <form action="{{ route('create-tipo-tratamento') }}" method="POST">
        @csrf
        <ul class="row form">
            <li class="col-sm-12">
                <label for="tipoTratamento">Tipo evolução do tratamento</label>
                <input type="text" id="tipoTratamento" name="tipo_tratamento">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar tipo do tratamento</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DA TIPO DO TRATAMENTO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tipo do tratamento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tratamentos as $tratamento)
                <tr>
                    <td>
                        <span id="span-tratamento-{{ $tratamento->id }}">{{ $tratamento->tipo_tratamento }}</span>
                        <input type="text" class="form-control d-none" value="{{ $tratamento->tipo_tratamento }}" id="input-tratamento-{{ $tratamento->id }}">
                    </td>
                    <td>
                        <button class="btn btn-secondary" onclick="editarTratamento({{ $tratamento->id }})">Editar</button>
                        <button class="btn btn-success d-none" id="save-btn-{{ $tratamento->id }}" onclick="salvarTratamento({{ $tratamento->id }})">Salvar</button>
                    </td>
                    <td>
                        <form action="{{ route('delete-tipo-tratamento', $tratamento->id) }}" method="POST">
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
    function editarTratamento(tratamentoId) {
        let spanNome = document.getElementById(`span-tratamento-${tratamentoId}`);
        let inputNome = document.getElementById(`input-tratamento-${tratamentoId}`);
        let saveButton = document.getElementById(`save-btn-${tratamentoId}`);

        // Esconde o span e mostra o input
        spanNome.classList.add('d-none');
        inputNome.classList.remove('d-none');
        saveButton.classList.remove('d-none');
    }

    // Função para salvar a edição do tipo de tratamento
    function salvarTratamento(tratamentoId) {
        let inputNome = document.getElementById(`input-tratamento-${tratamentoId}`);
        let novoNome = inputNome.value;

        // Criação do formulário dinâmico para enviar os dados
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = `/ferramentas/update-tipo-tratamento/${tratamentoId}`;

        let csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}'; // Laravel CSRF token

        let methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'PUT'; // Método PUT para edição

        let nomeInput = document.createElement('input');
        nomeInput.type = 'hidden';
        nomeInput.name = 'tipo_tratamento';
        nomeInput.value = novoNome;

        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        form.appendChild(nomeInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>
@endsection
