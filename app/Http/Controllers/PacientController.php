<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacientController extends Controller
{
    public function index()
    {
        return view('welcome');
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

    


}
