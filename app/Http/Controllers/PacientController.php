<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use resources\views;

class PacientController extends Controller
{

    public function create(Request $request){
        $new_pacient = [
            'nome' => 'Lucas',
            'data_nascimento' => '2024-09-01 16:00:00',
            'cpf' => '17437837790',
            'cns' => '1743',
            'sexo' => 'outro',
            'evolucao' => false,
            'id_comorbidade' => '1',
        ];

        $pacient = new Paciente($new_pacient);
        $pacient->save();

        dd($pacient);
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


    
}




