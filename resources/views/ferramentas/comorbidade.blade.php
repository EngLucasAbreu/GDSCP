@extends('layouts.main')

@section('title', 'GDSCP - Comorbidade')

@section('content')
<div class="container-cad">
    <h3>COMORBIDADE</h3>
    <hr>
    <br>
    <form action="{{ route('create-comorbidade') }}" method="POST">
        @csrf
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <label for="tipo_comorbidade" class="ml-2">Tipo de comorbidade</label>
        <input type="text" class="form-control" id="tipo_comorbidade" name="tipo_comorbidade">

        <button type="submit" class="btn btn-secondary mt-2">Cadastrar comorbidade</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DAS COMORBIDADES</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Comorbidade</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comorbidades as $comorbidade)
                    <tr>
                        <td>
                            <span id="span-comorbidade-{{ $comorbidade->id }}">{{ $comorbidade->tipo_comorbidade }}</span>
                            <input type="text" class="form-control d-none" value="{{ $comorbidade->tipo_comorbidade }}" id="input-comorbidade-{{ $comorbidade->id }}">
                        </td>
                        <td>
                            <button class="btn btn-secondary" onclick="editarComorbidade({{ $comorbidade->id }})">Editar</button>
                            <button class="btn btn-success d-none" id="save-btn-{{ $comorbidade->id }}" onclick="salvarComorbidade({{ $comorbidade->id }})">Salvar</button>
                        </td>
                        <td>
                            <form action="{{ route('delete-comorbidade', $comorbidade->id) }}" method="POST">
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
    function editarComorbidade(comorbidadeId) {
        // Esconde o texto da comorbidade e mostra o input
        let spanNome = document.getElementById(`span-comorbidade-${comorbidadeId}`);
        let inputNome = document.getElementById(`input-comorbidade-${comorbidadeId}`);
        let saveButton = document.getElementById(`save-btn-${comorbidadeId}`);

        spanNome.classList.add('d-none');
        inputNome.classList.remove('d-none');
        saveButton.classList.remove('d-none');
    }

    // Função para salvar a edição da comorbidade
    function salvarComorbidade(comorbidadeId) {
        let inputNome = document.getElementById(`input-comorbidade-${comorbidadeId}`);
        let novoNome = inputNome.value;

        // Criação do formulário dinâmico para enviar os dados
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = `/ferramentas/update-comorbidade/${comorbidadeId}`;

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
        nomeInput.name = 'tipo_comorbidade';
        nomeInput.value = novoNome;

        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        form.appendChild(nomeInput);

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
    }, 3000); // 5000 milissegundos = 5 segundos
</script>
@endsection
