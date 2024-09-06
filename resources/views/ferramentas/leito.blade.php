@extends('layouts.main')

@section('title', 'GDSCP - Leito')

@section('content')
{{-- @include('msg.message') --}}
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
                        <option value="{{ $sala->id }}">{{ $sala->nome_sala }}</option>)
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
                        <td>{{ $leito->id_sala }}</td>
                        <td>{{ $leito->tipo_leito }}</td>
                        <td>
                            <button class="btn btn-secondary">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger">Deletar</button>
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
