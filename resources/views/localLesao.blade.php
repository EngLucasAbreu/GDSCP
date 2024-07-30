@extends('layouts.main')

@section('title', 'NSP - Local da Lesão')

@section('content')
<div class="container-cad">
    <h3>LOCAL DA LESÃO</h3>
    <hr>
    <br>
    <form action="/clientes" method="GET">
        <ul class="row form">
            <li class="col-sm-12">
                <label for="lesao">Lesão</label>
                <input type="text" id="lesao" name="lesao">
            </li>
        </ul>
        <button type="submit" class="btn btn-secondary">Cadastrar Local da Lesão</button>
    </form>
    <div>
        <br>
        <br>
        <h3>REGISTRO DOS LOCAIS DA LESÃO</h3>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Locais da Lesão</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lucas</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>João</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>Maria</td>
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