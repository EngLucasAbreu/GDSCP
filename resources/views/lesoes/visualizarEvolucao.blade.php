@extends('layouts.main')

@section('title', 'GDSCP - Visualizar Paciente')

@section('content')
<style>
    .btn-custom {
    background-color: #e30505;
    color: #ffffff
    }

    .btn-custom:hover {
    background-color: #be0303;
    color: #ffffff
}
</style>
<div class="container-cad">
    <h3>DADOS DO PACIENTE</h3>
    <hr>
    <br>
    <form action="/pacientes" method="POST">
        <ul class="row form">
            <li class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome">
            </li>
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento">
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf">
            </li>
            <li class="col-sm">
                <label for="cns">CNS</label>
                <input type="text" id="cns" name="cns">
            </li>
            <li class="col-sm">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                    <option value="N">Prefiro não informar</option>
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-4">
                <label for="comorbidade">Comorbidade</label>
                <select id="comorbidade" name="comorbidade">
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </li>
        </ul>
        <div class="text-right">
            <button type="submit" class="btn btn-custom mr-2">DAR ALTA AO PACIENTE</button>
            <button type="submit" class="btn btn-primary">NOVO INCIDENTE</button>
        </div>
    </form>
        <br>
        <br>
        <h3>EVENTOS</h3>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Data de internação</th>
                    <th scope="col">Data do evento</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Leito</th>
                    <th scope="col">Local de Lesão</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>1</td>
                    <td>Calcanhar</td>
                    <td><button class="btn btn-secondary"><ion-icon name="eye-outline" class="mr-2"></ion-icon>VISUALIZAR</button></td>
                </tr>
                <tr>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>2</td>
                    <td>Calcanhar</td>
                    <td><button class="btn btn-secondary"><ion-icon name="eye-outline" class="mr-2"></ion-icon>VISUALIZAR</button></td>
                </tr>
                <tr>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>UTI</td>
                    <td>3</td>
                    <td>Calcanhar</td>
                    <td><button class="btn btn-secondary"><ion-icon name="eye-outline" class="mr-2"></ion-icon>VISUALIZAR</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
