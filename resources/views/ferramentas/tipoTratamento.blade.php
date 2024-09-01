@extends('layouts.main')

@section('title', 'GDSCP - Tipo de Tratamento')

@section('content')
<div class="container-cad">
    <h3>TIPO DE TRATAMENTO</h3>
    <hr>
    <br>
    <form action="/pacientes" method="GET">
        <ul class="row form">
            <li class="col-sm-12">
                <label for="tipotratamento">Tipo de Tratamento</label>
                <input type="text" id="tipotratamento" name="tipotratamento">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar Tipo de Tratamento</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DOS TIPOS DE TRATAMENTO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tipos de Tratamento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>antibiotico</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>fisioterapia</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>descanso</td>
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
@endsection