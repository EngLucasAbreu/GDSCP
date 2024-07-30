@extends('layouts.main')

@section('title', 'NSP - Tipo de Lesão')

@section('content')
<div class="container-cad">
    <h3>TIPO DE LESÃO</h3>
    <hr>
    <br>
    <form action="/clientes" method="GET">
        <ul class="row form">
            <li class="col-sm-12">
                <label for="tipolesao">Tipo de Lesão</label>
                <input type="text" id="tipolesao" name="tipolesao">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar Tipo de Lesão</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DOS TIPOS DE LESÃO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tipos de Lesão</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Cranio</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>Tibia</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>Radio</td>
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