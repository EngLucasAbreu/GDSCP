<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Leito;
use App\Models\Lesao;
use App\Models\Paciente;
use App\Models\Incidente;
use App\Models\TipoLesao;
use App\Models\LocalLesao;
use App\Models\Tratamento;
use App\Models\Comorbidade;
use Illuminate\Http\Request;
use App\Models\StatusPaciente;
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
        $setores = Setor::all();
        $leitos = Leito::all();
        $comorbidades = Comorbidade::all();
        $tratamentos = Tratamento::all();
        $lesoes = Lesao::all();
        $locais = LocalLesao::where('regiao_lesao', '!=', '')->get();
        $tipos = TipoLesao::where('descricao_lesao', '!=', '')->get();
        return view('pacientes.cadastrarPaciente', [
            'setores' => $setores,
            'leitos' => $leitos,
            'comorbidades' => $comorbidades,
            'tratamentos' => $tratamentos,
            'lesoes' => $lesoes,
            'locais' => $locais,
            'tipos' => $tipos,
        ]);
    }

    public function edit($paciente_id)
    {
        $evolucao = PacienteIncidenteLeito::where('id_paciente', $paciente_id)->get();
        $setores = Setor::all();
        $leitos = Leito::all();
        $comorbidades = Comorbidade::all();
        foreach ($evolucao as $p) {
            $p = $p->paciente;
        }
        foreach ($evolucao as $l) {
            $l = $l->leito;
        }
        foreach ($evolucao as $s) {
            $s = $s->statusPaciente;
        }
        return view('pacientes.editarPaciente', compact('evolucao', 'p', 'l', 's', 'setores', 'leitos', 'comorbidades', 'paciente_id'));
    }

    public function update(Request $request, $paciente_id)
    {

        DB::beginTransaction();
        try {

            $paciente = Paciente::where('id', $paciente_id)->update([
                'nome' => $request->nome,
                'data_nascimento' => $request->nascimento,
                'cpf' => $request->cpf,
                'cns' => $request->cns,
                'sexo' => $request->sexo,
                'evolucao' => true,
                'id_comorbidade' => $request->id_comorbidade,
            ]);

            $pacienteIncidenteLeito = PacienteIncidenteLeito::where('id_paciente', $paciente_id)->update([
                'id_paciente' => $paciente_id,
                'id_leito' => $request->leito,
            ]);

            DB::commit();
            return redirect()->route('pacientes.pesquisar')->with('success', 'Paciente atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erro ao atualizar paciente. ' . $e->getMessage())->withInput();
        }
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
            'setor' => 'required|string|max:255',
            'leito' => 'required|string|max:255',
            'descricao' => 'required|string',
            'sexo' => 'required|string|in:M,F,O,N',
        ]);

        DB::beginTransaction();
        try {
            // Initialize comorbidade_id as null in case it's not created

            $leito = Leito::where('id', $request->leito)->get();


            foreach ($leito as $l) {
                $leito_id = $l->id;
            }

            $lesao = Lesao::create([
                'id_tipo_lesao' => $request->tipo_lesao,
                'id_local_lesao' => $request->local_lesao,
            ]);


            $paciente = Paciente::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->nascimento,
                'cpf' => $request->cpf,
                'cns' => $request->cns,
                'sexo' => $request->sexo,
                'evolucao' => true,
                'id_comorbidade' => $request->id_comorbidade, // O valor correto deve ser capturado aqui
            ]);

            $incidente = Incidente::create([
                'data_evento' => $request->evento,
                'id_lesao' => $lesao->id,
                'id_tratamento' => $request->tipo_tratamento,
                'descricao' => $request->descricao,
            ]);

            $status = StatusPaciente::create([
                'paciente_alta' => false,
                'data_internacao' => $request->internacao,
                'data_alta' => null,
            ]);

            PacienteIncidenteLeito::create([
                'id_paciente' => $paciente->id,
                'id_incidente' => $incidente->id,
                'id_leito' => $leito_id,
                'id_status_paciente' => $status->id,
            ]);

            DB::commit();

            return redirect()->route('read-evolucao-lesao', ['paciente_id' => $paciente->id])->with('success', 'Paciente e incidente cadastrados com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erro ao cadastrar paciente e incidente. ' . $e->getMessage())->withInput();
        }
    }

    public function pesquisar()
    {
        $pacientes = $this->pacienteIncidenteLeitoService->getAllIncidentesLeitos();
        return view('pacientes.pesquisar', compact('pacientes'));
    }

    public function pesquisarPaciente(Request $request)
    {
        $pacientes = [];
        $paciente_id = null;
        $nome = $request->nome;
        $cpf = $request->cpf;
        if ($nome == null && $cpf == null) {
            $pacientes = $this->pacienteIncidenteLeitoService->getAllIncidentesLeitos();
        }
        if ($nome !== null || $cpf !== null) {
            $pacientes = $this->pacienteIncidenteLeitoService->getIncidentesLeitos($nome, $cpf);
            foreach ($pacientes as $p) {
                $paciente_id = $p->id;
            }
        }


        return view('pacientes.pesquisar', compact('pacientes', 'paciente_id'));
    }

    public function getLeitosBySetor(Request $request, $id_setor)
    {
        try {
            // Buscando leitos associados à setor
            $leitos = Leito::where('id_setor', $id_setor)->get();
            // Verifica se encontrou leitos
            if ($leitos->isEmpty()) {
                return response()->json(['message' => 'Nenhum leito encontrado'], 404);
            }

            // Retorna os leitos como JSON
            return response()->json($leitos);
        } catch (\Exception $e) {
            // Log do erro para depuração
            Log::error('Erro ao buscar leitos: ' . $e->getMessage());
            return response()->json(['error' => 'Erro no servidor: ' . $e->getMessage()], 500);
        }
    }

}
