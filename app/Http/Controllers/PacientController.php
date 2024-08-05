<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacientController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function cadastrarCliente()
    {
        return view('cadastrarCliente');
    }

    public function evolucao()
    {
        return view('evolucao');
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
        return view('localLesao');
    }

    public function sala()
    {
        return view('sala');
    }

    public function leito()
    {
        return view('leito');
    }

    public function tipoLesao()
    {
        return view('tipoLesao');
    }

    public function tipoTratamento()
    {
        return view('tipoTratamento');
    }


    
}




