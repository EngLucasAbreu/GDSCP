<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use resources\views;

class PacientController extends Controller
{

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'cpf' => 'required|string|max:11',
            'cns' => 'nullable|string|max:15',
            'sexo' => 'required|string|in:M,F,O,N',
            'comorbidade' => 'required|string|in:S,N',
        ]);

        $new_pacient = [
            'nome' => $validatedData['nome'],
            'data_nascimento' => $validatedData['nascimento'],
            'cpf' => $validatedData['cpf'],
            'cns' => $validatedData['cns'],
            'sexo' => $validatedData['sexo'],
            'evolucao' => false,
            'id_comorbidade' => $validatedData['comorbidade'] === 'S' ? 4 : null,
        ];

        $pacient = new Paciente($new_pacient);
        $pacient->save();

        return redirect()->back()->with('success', 'Paciente cadastrado com sucesso!');
    }


    public function read(Request $request, $id){
        $paciente = Paciente::find($id);
        return $paciente;
    }

    public function read_all(Request $request){
        $pacientes = Paciente::all();
        return $pacientes;
    }

    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function cadastrarPaciente()
    {
        return view('pacientes.cadastrarPaciente');
    }

    public function evolucao()
    {
        return view('lesoes.evolucao');
    }

    public function visualizar()
    {
        return view('visualizar');
    }

    public function evoluir()
    {
        return view('regEvolucao');
    }

    public function localLesao()
    {
        return view('ferramentas.localLesao');
    }

    public function sala()
    {
        return view('ferramentas.sala');
    }

    public function leito()
    {
        return view('ferramentas.leito');
    }

    public function tipoLesao()
    {
        return view('ferramentas.tipoLesao');
    }

    public function tipoTratamento()
    {
        return view('ferramentas.tipoTratamento');
    }

    public function comorbidade()
    {
        return view('ferramentas.comorbidade');
    }



}




