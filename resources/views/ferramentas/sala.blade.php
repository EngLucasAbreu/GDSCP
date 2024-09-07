@extends('layouts.main')

@section('title', 'GDSCP - Sala')

@section('content')
<div class="container-cad">
    <h3>SALA</h3>
    <hr>
    <br>
    <form action="{{ route('create-sala') }}" method="POST">
        @csrf
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        <label for="sala" class="ml-2">Cadastrar nova sala</label>
        <input type="text" class="form-control" aria-label="Text input with dropdown button" id="sala-input" name="nome_sala">

        <button type="submit" class="btn btn-secondary mt-2">Cadastrar Sala</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DAS SALAS</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Salas</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salas as $sala)
                    <tr>
                        <td>
                            <span id="span-sala-{{ $sala->id }}">{{ $sala->nome_sala }}</span>
                            <input type="text" class="form-control d-none" value="{{ $sala->nome_sala }}" id="input-sala-{{ $sala->id }}">
                        </td>
                        <td>
                            <button class="btn btn-secondary" onclick="editarSala({{ $sala->id }})">Editar</button>
                            <button class="btn btn-success d-none" id="save-btn-{{ $sala->id }}" onclick="salvarSala({{ $sala->id }})">Salvar</button>
                        </td>
                        <td>
                            <form action="{{ route('delete-sala', $sala->nome_sala) }}" method="POST">
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
    function editarSala(salaId) {
        // Seleciona o elemento específico com base no salaId
        let spanNome = document.getElementById(`span-sala-${salaId}`);
        let inputNome = document.getElementById(`input-sala-${salaId}`);
        let saveButton = document.getElementById(`save-btn-${salaId}`);

        // Esconde o span e mostra o input
        spanNome.classList.add('d-none');
        inputNome.classList.remove('d-none');
        saveButton.classList.remove('d-none');
    }

    // Função para salvar a edição da sala
    function salvarSala(salaId) {
        let inputNome = document.getElementById(`input-sala-${salaId}`);
        let novoNome = inputNome.value;

        // Aqui você pode enviar os dados para o backend com AJAX ou redirecionar para outra rota com o novo nome.
        // No exemplo, vamos apenas enviar o formulário de forma tradicional com uma requisição POST.
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = `/ferramentas/update-sala/${salaId}`;

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
        nomeInput.name = 'nome_sala';
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
