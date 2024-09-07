<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesao;

class LesoesController extends Controller
{
    public function create()
    {
        return view('lesoes.pesquisar');
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

    public function readAllPesquisarLesoes(Request $request)
    {
        $lesoes = Lesao::all();

        return view('lesoes.pesquisar', compact('lesoes'));
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
