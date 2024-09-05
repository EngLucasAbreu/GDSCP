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
        <input type="text" class="form-control" id="tipo_comorbidade" name="tipo_comorbidade" placeholder="Cadastrar nova comorbidade">

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
                        <td>{{ $comorbidade->tipo_comorbidade }}</td>
                        <td>
                            <button class="btn btn-secondary">Editar</button>
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
    setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 5000); // 5000 milissegundos = 5 segundos
</script>
@endsection
