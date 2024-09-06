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
    public function createSala(Request $request){
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
        $sala->nome_sala = $validatedData['nome_sala'];
        $sala->save();

        return redirect()->route('salas.index')->with('success', 'Sala atualizada com sucesso!');
    }

    public function deleteSala(Request $request, $nome_sala){
        $sala = Sala::where('nome_sala', $nome_sala)->first(); // Busca a sala pelo nome

        if ($sala) {
            $sala->delete();
            return redirect()->route('salas.index')->with('success', 'Sala deletada com sucesso!');
        } else {
            return redirect()->route('salas.index')->with('error', 'Sala não encontrada!');
        }
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
            'tipo_leito' => 'required|string|max:255',
            'id_sala' => 'required|integer',
        ]);
        $leito = Leito::find($id);
        $leito->tipo_leito = $validatedData['tipo_leito'];
        $leito->id_sala = $validatedData['id_sala'];
        $leito->save();

        return redirect()->route('leitos.index')->with('success', 'Leito atualizado com sucesso!');
    }

    public function deleteLeito(Request $request, $id){
        $leito = Leito::where('id', $id)->first(); // Busca o leito pelo id

        if ($leito) {
            $leito->delete();
            return redirect()->route('leitos.index')->with('success', 'Leito deletado com sucesso!');
        } else {
            return redirect()->route('leitos.index')->with('error', 'Leito não encontrado!');
        }
    }


    //COMORBIDADES
    public function createComorbidade(Request $request){
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

    public function readAllComorbidades(Request $request){
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

        return redirect()->route('comorbidades.index')->with('success', 'Comorbidade atualizada com sucesso!');
    }

    public function deleteComorbidade($id){
        $comorbidade = Comorbidade::where('id', $id)->first(); // Busca a comorbidade pelo id

        if ($comorbidade) {
            $comorbidade->delete();
            return redirect()->route('comorbidades.index')->with('success', 'Comorbidade deletada com sucesso!');
        } else {
            return redirect()->route('comorbidades.index')->with('error', 'Comorbidade não encontrada!');
        }
    }


    //LESOES
    public function createLocalLesao(Request $request){
        $validatedData = $request->validate([
            'local_lesao' => 'required|string|max:255',
        ]);
        $new_lesao = [
            'local_lesao' => $validatedData['local_lesao'],
            'tipo_lesao' => '',
        ];
        $lesao = new Lesao($new_lesao);
        $lesao->save();
        return redirect()->route('read-all-local-lesao')->with('success', 'Local da lesão cadastrada com sucesso!');
    }

    public function createTipoLesao(Request $request){
        $validatedData = $request->validate([
            'tipo_lesao' => 'required|string|max:255',
        ]);
        $new_lesao = [
            'local_lesao' => '',
            'tipo_lesao' => $validatedData['tipo_lesao'],
        ];
        $lesao = new Lesao($new_lesao);
        $lesao->save();
        return redirect()->route('read-all-tipo-lesao')->with('success', 'Local da lesão cadastrada com sucesso!');
    }

    public function readLesao(Request $request, $id){
        $lesao = Lesao::find($id);
        return $lesao;
    }

    public function readAllLocalLesoes(Request $request){
        $lesoes = Lesao::where('local_lesao', '!=', '')->get();
        return view('ferramentas.localLesao', compact('lesoes'));
    }

    public function readAllTipoLesoes(Request $request){
        $lesoes = Lesao::where('tipo_lesao', '!=', '')->whereNotNull('tipo_lesao')->get();
        return view('ferramentas.tipoLesao', compact('lesoes'));
    }

    public function updateLocalLesao(Request $request, $id){
        $validatedData = $request->validate([
            'local_lesao' => 'required|string|max:255',
        ]);
        $lesao = Lesao::find($id);
        $lesao->local_lesao = $validatedData['local_lesao'];
        $lesao->tipo_lesao = '';
        $lesao->save();

        return redirect()->route('read-all-local-lesao')->with('success', 'Lesão atualizada com sucesso!');
    }

    public function updateTipoLesao(Request $request, $id){
        $validatedData = $request->validate([
            'tipo_lesao' => 'required|string|max:255',
        ]);
        $lesao = Lesao::find($id);
        $lesao->tipo_lesao = $validatedData['tipo_lesao'];
        $lesao->local_lesao = '';
        $lesao->save();

        return redirect()->route('read-all-tipo-lesao')->with('success', 'Lesão atualizada com sucesso!');
    }

    public function deleteLocalLesao(Request $request, $id){
        $local_lesao = Lesao::where('id', $id)->first(); // Busca a lesao pelo id

        if ($local_lesao) {
            $local_lesao->delete();
            return redirect()->route('read-all-local-lesao')->with('success', 'Lesão deletada com sucesso!');
        } else {
            return redirect()->route('read-all-local-lesao')->with('error', 'Lesão não encontrada!');
        }
    }

    public function deleteTipoLesao(Request $request, $id){
        $tipo_lesao = Lesao::where('id', $id)->first(); // Busca a lesao pelo id

        if ($tipo_lesao) {
            $tipo_lesao->delete();
            return redirect()->route('read-all-tipo-lesao')->with('success', 'Lesão deletada com sucesso!');
        } else {
            return redirect()->route('read-all-tipo-lesao')->with('error', 'Lesão não encontrada!');
        }
    }


    //TRATAMENTOS
    public function createTipoTratamento(Request $request){
        $validatedData = $request->validate([
            'tipo_tratamento' => 'required|string|max:255',
        ]);
        $new_tratamento = [
            'tipo_tratamento' => $validatedData['tipo_tratamento'],
        ];
        $tratamento = new Tratamento($new_tratamento);
        $tratamento->save();
        return redirect()->route('read-all-tipo-tratamento')->with('success', 'Tipo de tratamento cadastrada com sucesso!');
    }

    public function readTratamento(Request $request, $id){
        $tratamento = Tratamento::find($id);
        return $tratamento;
    }


    public function readAllTipoTratamentos(Request $request){
        $tratamentos = Tratamento::all();
        return view('ferramentas.tipoTratamento', compact('tratamentos'));

    }

    public function updateTratamento(Request $request, $id){
        $validatedData = $request->validate([
            'tipo_tratamento' => 'required|string|max:255',
        ]);
        $tratamento = Tratamento::find($id);
        $tratamento->tipo_tratamento = $validatedData['tipo_tratamento'];
        $tratamento->save();

        return redirect()->route('read-all-tipo-tratamento')->with('success', 'Tratamento atualizado com sucesso!');
    }

    public function deleteTratamento(Request $request, $id){
        $tratamento = Tratamento::where('id', $id)->first(); // Busca o tratamento pelo id

        if ($tratamento) {
            $tratamento->delete();
            return redirect()->route('read-all-tipo-tratamento')->with('success', 'Tratamento deletado com sucesso!');
        } else {
            return redirect()->route('read-all-tipo-tratamento')->with('error', 'Tratamento não encontrado!');
        }
    }
}
