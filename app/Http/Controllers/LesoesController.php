<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LesoesController extends Controller
{
    public function create()
    {
        return view('lesoes.evolucao');
    }

    public function read()
    {
        return view('lesoes.pesquisarLesao');
    }

    public function readAllLesoes(Request $request)
    {
        $lesoes = Lesao::all();

        return view('lesoes.evolucao', compact('lesoes'));
    }

    public function update()
    {
        return view('lesoes.atualizarLesao');
    }

    public function delete()
    {
        return view('lesoes.deletarLesao');
    }

}
