<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leito;
use App\Models\Sala;
use App\Models\Tratamento;
use App\Models\Lesao;
use App\Models\Comorbidade;
use resources\views;



class FerramentasController extends Controller
{

    //SALAS
    public function createSala(Request $request)
    {
        $validatedData = $request->validate([
            'nome_sala' => 'required|string|max:255',
        ]);

        $new_sala = [
            'nome_sala' => $validatedData['nome_sala'],
        ];

        $sala = new Sala($new_sala);
        $sala->save();

        return redirect()->route('salas.index')->with('success', 'Sala cadastrada com sucesso!');


    }

    public function readSala(Request $request, $id){
        $sala = Sala::find($id);
        return $sala;
    }

    public function readAllSalas(Request $request){
        $salas = Sala::all();
        return view('ferramentas.sala', compact('salas'));
    }

    public function updateSala(Request $request, $id){
        $validatedData = $request->validate([
            'nome_sala' => 'required|string|max:255',
        ]);
        $sala = Sala::find($id);
        $sala->nome = $validatedData['nome_sala'];
        $sala->save();
    }

    public function deleteSala($id)
    {
        $sala = Sala::findOrFail($id);
        $sala->delete();

        return redirect()->route('salas.index')->with('success', 'Sala deletada com sucesso!');
    }


    //LEITOS
    public function createLeito(Request $request){
        $validatedData = $request->validate([
            'tipo_leito' => 'required|string|max:255',
            'id_sala' => 'required|integer',
        ]);
        $new_leito = [
            'tipo_leito' => $validatedData['tipo_leito'],
            'id_sala' => $validatedData['id_sala'],
        ];
        $leito = new Leito($new_leito);
        $leito->save();
        return redirect()->route('leitos.index')->with('success', 'Leito cadastrada com sucesso!');
    }

    public function readLeito(Request $request, $id){
        $leito = Leito::find($id);
        return $leito;
    }

    public function readAllLeitos(Request $request){
        $salas = Sala::all();
        $leitos = Leito::all();
        return view('ferramentas.leito', compact('leitos', 'salas'));
    }

    public function updateLeito(Request $request, $id){
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'id_sala' => 'required|integer',
        ]);
        $leito = Leito::find($id);
        $leito->nome = $validatedData['nome'];
        $leito->id_sala = $validatedData['id_sala'];
        $leito->save();
    }

    public function deleteLeito(Request $request, $id){
        $validatedData = $request->validate([
            'id' => 'required|integer',
        ]);
        $leito = Leito::find($id);
        $leito->delete();
    }


    //TRATAMENTOS
    public function createTratamento(Request $request){
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);
        $new_tratamento = [
            'nome' => $validatedData['nome'],
        ];
        $tratamento = new Tratamento($new_tratamento);
        $tratamento->save();
        return $tratamento;
    }

    public function readTratamento(Request $request, $id){
        $tratamento = Tratamento::find($id);
        return $tratamento;
    }

    public function readAllTratamentos(Request $request){
        $tratamentos = Tratamento::all();
        return $tratamentos;
    }

    public function updateTratamento(Request $request, $id){

    }

    public function deleteTratamento(Request $request, $id){

    }


    //LESOES
    public function createLesao(Request $request){

    }

    public function readLesao(Request $request, $id){
        $lesao = Lesao::find($id);
        return $lesao;
    }

    public function readAllLesoes(Request $request){
        $lesoes = Lesao::all();
        return $lesoes;
    }

    public function updateLesoes(Request $request, $id){

    }

    public function deleteLesoes(Request $request, $id){

    }


    //COMORBIDADES
    public function createComorbidade(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_comorbidade' => 'required|string|max:255',
        ]);

        $new_comorbidade = [
            'tipo_comorbidade' => $validatedData['tipo_comorbidade'],
        ];

        $comorbidade = new Comorbidade($new_comorbidade);
        $comorbidade->save();

        return redirect()->route('comorbidades.index')->with('success', 'Comorbidade cadastrada com sucesso!');
    }

    public function readComorbidade(Request $request, $id){
        $comorbidade = Comorbidade::find($id);
        return $comorbidade;
    }

    public function readAllComorbidades(Request $request)
    {
        $comorbidades = Comorbidade::all();
        return view('ferramentas.comorbidade', compact('comorbidades'));
    }

    public function updateComorbidade(Request $request, $id){
        $validatedData = $request->validate([
            'tipo_comorbidade' => 'required|string|max:255',
        ]);
        $comorbidade = Comorbidade::find($id);
        $comorbidade->tipo_comorbidade = $validatedData['tipo_comorbidade'];
        $comorbidade->save();
    }

    public function deleteComorbidade($id)
    {
        $comorbidade = Comorbidade::findOrFail($id);
        $comorbidade->delete();

        return redirect()->route('comorbidades.index')->with('success', 'Comorbidade deletada com sucesso!');
    }
}
