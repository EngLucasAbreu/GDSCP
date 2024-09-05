<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Incidente;
use App\Models\Comorbidade;
use App\Models\Tratamento;
use App\Models\Lesao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PacientesController extends Controller
{

    public function __construct()
    {
        //
    }

    public function create()
    {
        return view('pacientes.cadastrarPaciente');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'cpf' => 'required|string|max:14|unique:pacientes',
            'cns' => 'required|string|max:15|unique:pacientes',
            'internacao' => 'required|date',
            'evento' => 'required|date',
            'sala' => 'required|string|max:255',
            'leito' => 'required|string|max:255',
            'descricao' => 'required|string',
            'sexo' => 'required|string|in:M,F,O,N',
        ]);

        DB::beginTransaction();
        try {
            // Initialize comorbidade_id as null in case it's not created
            $comorbidade_id = null;

            if ($request->has('comorbidade')) {
                $comorbidade = Comorbidade::create([
                    'tipo_comorbidade' => $request->comorbidade,
                ]);
                $comorbidade_id = $comorbidade->id;
            }

            $lesao = Lesao::create([
                'tipo_lesao' => $request->tipoLesao,
                'local_lesao' => $request->localLesao,
            ]);
            $tratamento = Tratamento::create([
                'tipo_tratamento' => $request->tratamento,
            ]);

            Paciente::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->nascimento,
                'cpf' => $request->cpf,
                'cns' => $request->cns,
                'sexo' => $request->sexo,
                'evolucao' => true,
                'id_comorbidade' => $comorbidade_id,  // Will be null if no comorbidade was provided
            ]);

            Incidente::create([
                'data_internacao' => $request->internacao,
                'saida' => $request->evento,
                'id_lesao' => $lesao->id,
                'id_tratamento' => $tratamento->id,
                'descricao' => $request->descricao,
            ]);

            DB::commit();

            return redirect()->route('pacientes.create')->with('success', 'Paciente e incidente cadastrados com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erro ao cadastrar paciente e incidente. ' . $e->getMessage())->withInput();
        }
    }

    public function pesquisar(Request $request)
    {
        $pacientes = DB::table('pacientes')->get();
        return view('pacientes.pesquisar', ['pacientes' => $pacientes]);
    }
}
