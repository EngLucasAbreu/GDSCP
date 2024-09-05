@extends('layouts.main')

@section('title', 'GDSCP - Local da Lesão')

@section('content')
@include('msg.message')
<div class="container-cad">
    <h3>LOCAL DA LESÃO</h3>
    <hr>
    <br>
    <form action="{{ route('create-local-lesao') }}" method="POST">
        @csrf
        <ul class="row form">
            <li class="col-sm-12">
                <label for="lesao">Local da lesão</label>
                <input type="text" id="lesao" name="local_lesao">
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
                @foreach ($lesoes as $local)
                <tr>
                    <td>{{ $local->local_lesao }}</td>
                    <td>
                        <button class="btn btn-secondary">Editar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Deletar</button>
                    </td>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
