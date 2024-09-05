@extends('layouts.main')

@section('title', 'GDSCP - Sala')

@section('content')
<div class="container-cad">
    <h3>SALA</h3>
    <hr>
    <br>
    <form action="/pacientes" method="GET">
        <label for="sala" class="ml-2">Cadastrar nova sala</label>
        <input type="text" class="form-control" aria-label="Text input with dropdown button" id="sala-input">

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
                <tr>
                    <td>304</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>206</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    // Função que atualiza o input com o valor selecionado no dropdown
    function selecionarSala(sala) {
        document.getElementById('sala-input').value = sala;
    }
</script>
@endsection
