@extends('layouts.main')

@section('title', 'GDSCP - Visualizar Paciente')

@section('content')
<div class="container-cad">
    <h3>FILTRO DE PESQUISA</h3>
    <hr>
    <br>
    <form action="/pacientes" method="GET">
        <ul class="row form">
            <li class="col-sm-6">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome">
            </li>
            <li class="col-sm-4">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf">
            </li>
            <li class="col-sm-2">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento">
            </li>
        </ul>
        <button type="submit">PESQUISAR</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRAR EVOLUÇÃO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Data de internação</th>
                    <th scope="col">Data do evento</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Leito</th>
                    <th scope="col">Local de Lesão</th>
                    <th scope="col">Tipo de Lesão</th>
                    <th scope="col">Tipo de Tratamento</th>
                    <th scope="col">Evolução do Tratamento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>1</td>
                    <td>Calcanhar</td>
                    <td>Lesão por pressão</td>
                    <td>Curativo</td>
                    <td>Em tratamento</td>
                </tr>
                <tr>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>2</td>
                    <td>Calcanhar</td>
                    <td>Lesão por pressão</td>
                    <td>Curativo</td>
                    <td>Em tratamento</td>
                </tr>
                <tr>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>3</td>
                    <td>Calcanhar</td>
                    <td>Lesão por pressão</td>
                    <td>Curativo</td>
                    <td>Em tratamento</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection