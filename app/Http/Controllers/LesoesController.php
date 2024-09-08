<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Leito;
use App\Models\TipoLesao;
use App\Models\LocalLesao;
use App\Models\Tratamento;
use App\Models\Comorbidade;
use App\Models\PacienteIncidenteLeito;

class LesoesController extends Controller
{
    public function create()
    {
        return view('lesoes.pesquisar');
    }

    public function readLesao($paciente_id)
    {
        $comorbidades = Comorbidade::all();
        $salas = Sala::all();
        $leitos = Leito::all();
        $locais = LocalLesao::all();
        $tipos = TipoLesao::all();
        $tratamentos = Tratamento::all();


        $evolucao = PacienteIncidenteLeito::find($paciente_id);
        return view('lesoes.regIncidente', compact('evolucao', 'comorbidades', 'salas', 'leitos', 'locais', 'tipos', 'tratamentos'));
    }

    public function readAllLesoes(Request $request)
    {
        $evolucoes = PacienteIncidenteLeito::all();

        return view('lesoes.evolucao', compact('evolucoes'));
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
