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
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                @foreach ($salas as $salas)
                    <tr>
                        <td>{{ $salas->nome_sala }}</td>
                        <td>
                            <button class="btn btn-secondary">Editar</button>
                        </td>
                        <td>
                            <form action="{{ route('delete-sala', $salas->id) }}" method="POST">
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
    // Função que atualiza o input com o valor selecionado no dropdown
    function selecionarSala(sala) {
        document.getElementById('sala-input').value = sala;
    }

    setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 5000); // 5000 milissegundos = 5 segundos
</script>
@endsection
