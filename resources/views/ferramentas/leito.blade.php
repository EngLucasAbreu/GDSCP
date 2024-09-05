@extends('layouts.main')

@section('title', 'GDSCP - Leito')

@section('content')
<div class="container-cad">
    <h3>LEITO</h3>
    <hr>
    <br>
    <form action="/pacientes" method="GET">
        <ul class="row form">
            <li class="col-sm-12">
                <label for="leito">Salas Cadastradas</label>
                <select>
                    <option value="0" selected>Selecione a Sala</option>
                    <option value="1">304</option>
                    <option value="2">206</option>
                    <option value="3">102</option>
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-12">
                <label for="leito">Identificação do Leito</label>
                <input type="text" id="leito" name="leito">
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
                    <th scope="col">Leitos</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
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
