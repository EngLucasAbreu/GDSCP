@extends('layouts.main')

@section('title', 'GDSCP - Setor')

@section('content')
<div class="container-cad">
    <h3>SETOR</h3>
    <hr>
    <br>
    <form action="{{ route('create-setor') }}" method="POST">
        @csrf
        <label for="setor" class="ml-2">Cadastrar novo setor</label>
        <input type="text" class="form-control" aria-label="Text input with dropdown button" id="setor-input" name="nome_setor">

        <button type="submit" class="btn btn-secondary mt-2">Cadastrar Setor</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DOS SETORES</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Setores</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($setores as $setor)
                    <tr>
                        <td>
                            <span id="span-setor-{{ $setor->id }}">{{ $setor->nome_setor }}</span>
                            <input type="text" class="form-control d-none" value="{{ $setor->nome_setor }}" id="input-setor-{{ $setor->id }}">
                        </td>
                        <td>
                            <button class="btn btn-secondary" onclick="editarSetor({{ $setor->id }})">Editar</button>
                            <button class="btn btn-success d-none" id="save-btn-{{ $setor->id }}" onclick="salvarSetor({{ $setor->id }})">Salvar</button>
                        </td>
                        <td>
                            <form action="{{ route('delete-setor', $setor->nome_setor) }}" method="POST">
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
    function editarSetor(setorId) {
        // Seleciona o elemento específico com base no setorId
        let spanNome = document.getElementById(`span-setor-${setorId}`);
        let inputNome = document.getElementById(`input-setor-${setorId}`);
        let saveButton = document.getElementById(`save-btn-${setorId}`);

        // Esconde o span e mostra o input
        spanNome.classList.add('d-none');
        inputNome.classList.remove('d-none');
        saveButton.classList.remove('d-none');
    }

    // Função para salvar a edição da setor
    function salvarSetor(setorId) {
        let inputNome = document.getElementById(`input-setor-${setorId}`);
        let novoNome = inputNome.value;

        // Aqui você pode enviar os dados para o backend com AJAX ou redirecionar para outra rota com o novo nome.
        // No exemplo, vamos apenas enviar o formulário de forma tradicional com uma requisição POST.
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = `/ferramentas/update-setor/${setorId}`;

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
        nomeInput.name = 'nome_setor';
        nomeInput.value = novoNome;

        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        form.appendChild(nomeInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>
@endsection
