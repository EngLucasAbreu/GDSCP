<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Leito;
use App\Models\Lesao;
use App\Models\Paciente;
use App\Models\Incidente;
use App\Models\TipoLesao;
use App\Models\LocalLesao;
use App\Models\Tratamento;
use App\Models\Comorbidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\PacienteIncidenteLeito;
use App\Services\PacienteIncidenteLeitoService;

class PacientesController extends Controller
{

    private $pacienteIncidenteLeitoService;
    public function __construct(PacienteIncidenteLeitoService $pacienteIncidenteLeitoService)
    {
        $this->pacienteIncidenteLeitoService = $pacienteIncidenteLeitoService;
    }

    public function create()
    {
        $salas = Sala::all();
        $leitos = Leito::all();
        $comorbidades = Comorbidade::all();
        $tratamentos = Tratamento::all();
        $lesoes = Lesao::all();
        $locais = Lesao::where('local_lesao', '!=', '')->get();
        $tipos = Lesao::where('tipo_lesao', '!=', '')->whereNotNull('tipo_lesao')->get();
        return view('pacientes.cadastrarPaciente', [
            'salas' => $salas,
            'leitos' => $leitos,
            'comorbidades' => $comorbidades,
            'tratamentos' => $tratamentos,
            'lesoes' => $lesoes,
            'locais' => $locais,
            'tipos' => $tipos,
        ]);
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

            $tipo_lesao = TipoLesao::create([
                'descricao_lesao' => $request->tipoLesao,
            ]);

            $local_lesao = LocalLesao::create([
                'regiao_lesao' => $request->localLesao,
            ]);

            $lesao = Lesao::create([
                'id_tipo_lesao' => $tipo_lesao->id,
                'id_local_lesao' => $local_lesao->id,
            ]);

            $tratamento = Tratamento::create([
                'tipo_tratamento' => $request->tratamento,
            ]);

            $sala = Sala::create([
                'nome_sala' => $request->sala,
            ]);

            $leito = Leito::create([
                'tipo_leito' => $request->leito,
                'id_sala' => $sala->id,
            ]);


            $paciente = Paciente::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->nascimento,
                'cpf' => $request->cpf,
                'cns' => $request->cns,
                'sexo' => $request->sexo,
                'evolucao' => true,
                'id_comorbidade' => $comorbidade_id,  // Will be null if no comorbidade was provided
            ]);

            $incidente = Incidente::create([
                'data_internacao' => $request->internacao,
                'saida' => $request->evento,
                'id_lesao' => $lesao->id,
                'id_tratamento' => $tratamento->id,
                'descricao' => $request->descricao,
            ]);

            PacienteIncidenteLeito::create([
                'id_paciente' => $paciente->id,
                'id_incidente' => $incidente->id,
                'id_leito' => $leito->id,
            ]);

            DB::commit();

            return redirect()->route('pacientes.create')->with('success', 'Paciente e incidente cadastrados com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erro ao cadastrar paciente e incidente. ' . $e->getMessage())->withInput();
        }
    }

    public function pesquisar()
    {
        $pacientes = [];
        return view('pacientes.pesquisar', compact('pacientes'));
    }

    public function pesquisarPaciente(Request $request)
    {
        $pacientes = [];
        $nome = $request->nome;
        $cpf = $request->cpf;
        if ($nome !== null || $cpf !== null) {
            $pacientes = $this->pacienteIncidenteLeitoService->getIncidentesLeitos($nome, $cpf);
        }
        return view('pacientes.pesquisar', compact('pacientes'));
    }
}
