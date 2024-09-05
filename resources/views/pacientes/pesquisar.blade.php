@extends('layouts.main')

@section('title', 'GDSCP - Pesquisar Paciente')

@section('content')
<div class="container-cad">
    <h3>FILTRO DE PESQUISA</h3>
    <hr>
    <br>
    <form action="/pacientes" method="GET">
        <ul class="row form">
            <li class="col-sm-6">
                <label for="nome" class="ml-2">Nome</label>
                <input type="text" id="nome" name="nome">
            </li>
            <li class="col-sm-6">
                <label for="cpf" class="ml-2">CPF</label>
                <input type="text" id="cpf" name="cpf">
            </li>
        </ul>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">PESQUISAR</button>
        </div>
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
                    <th scope="col">Pacientes</th>
                    <th scope="col">Data de Internação</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Leito</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lucas</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>1</td>
                    <td>
                        <a href="/visualizar">
                            <button type="button" class="btn btn-secondary">
                                <ion-icon name="eye-outline"></ion-icon>
                                Visualizar
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="/evoluir">
                            <button type="button" class="btn btn-primary">
                                <ion-icon name="create-outline"></ion-icon>
                                Evoluir
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>João</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>2</td>
                    <td>
                        <a href="/visualizar">
                            <button type="button" class="btn btn-secondary">
                                <ion-icon name="eye-outline"></ion-icon>
                                Visualizar
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="/evoluir">
                            <button type="button" class="btn btn-primary">
                                <ion-icon name="create-outline"></ion-icon>
                                Evoluir
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Maria</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>3</td>
                    <td>
                        <a href="/visualizar">
                            <button type="button" class="btn btn-secondary">
                                <ion-icon name="eye-outline"></ion-icon>
                                Visualizar
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="/evoluir">
                            <button type="button" class="btn btn-primary">
                                <ion-icon name="create-outline"></ion-icon>
                                Evoluir
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
