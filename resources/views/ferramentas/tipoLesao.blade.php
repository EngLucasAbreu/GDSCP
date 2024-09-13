@extends('layouts.main')

@section('title', 'GDSCP - Tipo de Lesão')

@section('content')
<div class="container-cad">
    <h3>TIPO DE LESÃO</h3>
    <hr>
    <br>
    <form action="{{ route('create-tipo-lesao')}}" method="POST">
        @csrf
        <ul class="row form">
            <li class="col-sm-12">
                <label for="tipolesao">Tipo de Lesão</label>
                <input type="text" id="tipolesao" name="descricao_lesao">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar Tipo de Lesão</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DOS TIPOS DE LESÃO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tipos de Lesão</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lesoes as $tipo)
                <tr>
                    <td>
                        <span id="span-lesao-{{ $tipo->id }}">{{ $tipo->descricao_lesao }}</span>
                        <input type="text" class="form-control d-none" value="{{ $tipo->descricao_lesao }}" id="input-lesao-{{ $tipo->id }}">
                    </td>
                    <td>
                        <button class="btn btn-secondary" onclick="editarLesao({{ $tipo->id }})">Editar</button>
                        <button class="btn btn-success d-none" id="save-btn-{{ $tipo->id }}" onclick="salvarLesao({{ $tipo->id }})">Salvar</button>
                    </td>
                    <td>
                        <form action="{{ route('delete-tipo-lesao', $tipo->id) }}" method="POST">
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
    function editarLesao(lesaoId) {
        let spanNome = document.getElementById(`span-lesao-${lesaoId}`);
        let inputNome = document.getElementById(`input-lesao-${lesaoId}`);
        let saveButton = document.getElementById(`save-btn-${lesaoId}`);

        // Esconde o span e mostra o input
        spanNome.classList.add('d-none');
        inputNome.classList.remove('d-none');
        saveButton.classList.remove('d-none');
    }

    // Função para salvar a edição do tipo de lesão
    function salvarLesao(lesaoId) {
        let inputNome = document.getElementById(`input-lesao-${lesaoId}`);
        let novoNome = inputNome.value;

        // Criação do formulário dinâmico para enviar os dados
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = `/ferramentas/update-tipo-lesao/${lesaoId}`;

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
        nomeInput.name = 'descricao_lesao';
        nomeInput.value = novoNome;

        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        form.appendChild(nomeInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>
@endsection
