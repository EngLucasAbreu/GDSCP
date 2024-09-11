<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sala;
use App\Models\Leito;
use App\Models\Lesao;
use App\Models\Incidente;
use App\Models\TipoLesao;
use App\Models\LocalLesao;
use App\Models\Tratamento;
use App\Models\Comorbidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Adapter\Local;
use App\Models\PacienteIncidenteLeito;

class LesoesController extends Controller
{
    public function storeNovoIncidente(Request $request, $paciente_id, $leito_id)
    {
        $paciente = PacienteIncidenteLeito::where('id_paciente', $paciente_id)->get();
        foreach ($paciente as $p) {
            $paciente = $p->paciente;
        }
        $data_internacao = $p->incidente->data_internacao;


        DB::beginTransaction();
        try {
            $paciente = $paciente_id;

            $leito = $leito_id;

            $lesao = Lesao::create([
                'id_local_lesao' => $request->local_lesao,
                'id_tipo_lesao' => $request->tipo_lesao,
            ]);


            $incidente = Incidente::create([
                'data_internacao' => $data_internacao,
                'data_evento' => $request->evento,
                'id_lesao' => $lesao->id,
                'id_tratamento' => $request->tipo_tratamento,
                'descricao' => $request->descricao,
            ]);

            PacienteIncidenteLeito::create([
                'id_paciente' => $paciente,
                'id_incidente' => $incidente->id,
                'id_leito' => $leito,
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao salvar a evolução do paciente');
        }

        return redirect()->route('read-evolucao-lesao', $paciente_id);
    }

    public function readLesao($paciente_id)
    {
        $evolucao = PacienteIncidenteLeito::where('id_paciente', $paciente_id)->get();

        foreach ($evolucao as $e) {
            $e = $e->paciente;
        }
        foreach ($evolucao as $teste) {
            $teste = $teste->id;
        }
        return view('lesoes.visualizarEvolucao', compact('evolucao', 'e', 'teste'));
    }

    public function readIncidenteLesao($paciente_id, $incidente_id)
    {
        $evolucao = PacienteIncidenteLeito::where('id_incidente', $incidente_id)->get();
        foreach ($evolucao as $e) {
            $e = $e->paciente;
        }
        foreach ($evolucao as $i) {
            $i = $i->incidente;
        }
        foreach ($evolucao as $l) {
            $l = $l->leito;
        }
        return view('lesoes.visualizarIncidentePaciente', compact('e', 'i', 'l'));
    }

    public function readAllLesoes(Request $request)
    {
        $evolucoes = PacienteIncidenteLeito::all();
        return view('lesoes.evolucao', compact('evolucoes'));
    }

    public function registrarNovoIncidente($paciente_id)
    {
        $evolucao = PacienteIncidenteLeito::where('id_paciente', $paciente_id)->get();
        $salas = Sala::all();
        $leitos = Leito::all();
        $comorbidades = Comorbidade::all();
        $tratamentos = Tratamento::all();
        $locais = LocalLesao::all();
        $tipos = TipoLesao::all();

        foreach ($evolucao as $e) {
            $e = $e->paciente;
        }

        foreach ($evolucao as $i) {
            $i = $i->leito;
        }

        foreach ($evolucao as $inc) {
            $inc = $inc->incidente;
        }

        return view('lesoes.regEvolucao', compact('inc', 'e', 'i', 'salas', 'leitos', 'comorbidades', 'tratamentos', 'locais', 'tipos'));
    }

    public function altaPaciente($paciente_id)
    {
        $evolucao = PacienteIncidenteLeito::where('id_paciente', $paciente_id)->get();
        foreach ($evolucao as $e) {
            $e = $e->paciente;
        }


        return view('lesoes.AltaPaciente', compact('e'));
    }

    public function liberarPaciente(Request $request, $paciente_id)
    {
        $paciente = PacienteIncidenteLeito::where('id_paciente', $paciente_id)->get();
        foreach ($paciente as $p) {
            $p = $p->paciente;
        }

        $data_saida = $request->data_saida;
        $motivo = $request->motivo;

        DB::beginTransaction();
        try {
            $paciente->update([
                'data_saida' => $data_saida,
                'motivo' => $motivo,
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao liberar o paciente');
        }

        return redirect()->route('read-evolucao-lesao', $paciente_id);
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
