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

    public function createSala(Request $request){
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $new_sala = [
            'nome' => $validatedData['nome'],
        ];

        $sala = new Sala($new_sala);
        $sala->save();

        return $sala;

    }

    public function readSala(Request $request, $id){
        $sala = Sala::find($id);
        return $sala;
    }

    public function readAllSalas(Request $request){
        $salas = Sala::all();
        return $salas;
    }

    public function updateSala(Request $request, $id){
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);
        $sala = Sala::find($id);
        $sala->nome = $validatedData['nome'];
        $sala->save();
    }

    public function deleteSala(Request $request, $id){
        $validatedData = $request->validate([
            'id' => 'required|integer',
        ]);
        $sala = Sala::find($id);
        $sala->delete();
    }

    public function createLeito(Request $request){
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'id_sala' => 'required|integer',
        ]);
        $new_leito = [
            'nome' => $validatedData['nome'],
            'id_sala' => $validatedData['id_sala'],
        ];
        $leito = new Leito($new_leito);
        $leito->save();
        return $leito;
    }

    public function readLeito(Request $request, $id){
        $leito = Leito::find($id);
        return $leito;
    }

    public function readAllLeitos(Request $request){
        $leitos = Leito::all();
        return $leitos;
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
        // Busca todas as comorbidades no banco de dados
        $comorbidades = Comorbidade::all();


        // Retorna a view e passa as comorbidades para ela
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
