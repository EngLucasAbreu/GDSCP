<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leito;
use App\Models\Setor;
use App\Models\Tratamento;
use App\Models\Lesao;
use App\Models\Comorbidade;
use App\Models\LocalLesao;
use App\Models\TipoLesao;
use resources\views;



class FerramentasController extends Controller
{

    //SETORES
    public function createSetor(Request $request){
        $validatedData = $request->validate([
            'nome_setor' => 'required|string|max:255',
        ]);

        $new_setor = [
            'nome_setor' => $validatedData['nome_setor'],
        ];

        $setor = new Setor($new_setor);
        $setor->save();

        return redirect()->route('setores.index')->with('success', 'Setor cadastrada com sucesso!');


    }

    public function readSetor(Request $request, $id){
        $setor = Setor::find($id);
        return $setor;
    }

    public function readAllSetores(Request $request){
        $setores = Setor::orderBy('nome_setor', 'asc')->get();
        return view('ferramentas.setor', compact('setores'));
    }

    public function updateSetor(Request $request, $id){
        $validatedData = $request->validate([
            'nome_setor' => 'required|string|max:255',
        ]);
        $setor = Setor::find($id);
        $setor->nome_setor = $validatedData['nome_setor'];
        $setor->save();

        return redirect()->route('setores.index')->with('success', 'Setor atualizada com sucesso!');
    }

    public function deleteSetor(Request $request, $nome_setor){
        $setor = Setor::where('nome_setor', $nome_setor)->first();

        if ($setor) {
            $setor->delete();
            return redirect()->route('setores.index')->with('success', 'Setor deletada com sucesso!');
        } else {
            return redirect()->route('setores.index')->with('error', 'Setor não encontrada!');
        }
    }



    //LEITOS
    public function createLeito(Request $request){
        $validatedData = $request->validate([
            'tipo_leito' => 'required|string|max:255',
            'id_setor' => 'required|integer',
        ]);
        $new_leito = [
            'tipo_leito' => $validatedData['tipo_leito'],
            'id_setor' => $validatedData['id_setor'],
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
        $setores = Setor::all();
        $leitos = Leito::all();
        return view('ferramentas.leito', compact('leitos', 'setores'));
    }

    public function updateLeito(Request $request, $id){
        $validatedData = $request->validate([
            'tipo_leito' => 'required|string|max:255',
            'id_setor' => 'required|integer',
        ]);
        $leito = Leito::find($id);
        $leito->tipo_leito = $validatedData['tipo_leito'];
        $leito->id_setor = $validatedData['id_setor'];
        $leito->save();

        return redirect()->route('leitos.index')->with('success', 'Leito atualizado com sucesso!');
    }

    public function deleteLeito(Request $request, $id){
        $leito = Leito::where('id', $id)->first();

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
        $comorbidade = Comorbidade::where('id', $id)->first();

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
            'regiao_lesao' => 'required|string|max:255',
        ]);
        $new_lesao = [
            'regiao_lesao' => $validatedData['regiao_lesao'],
        ];
        $lesao = new LocalLesao($new_lesao);
        $lesao->save();
        return redirect()->route('read-all-local-lesao')->with('success', 'Local da lesão cadastrada com sucesso!');
    }

    public function createTipoLesao(Request $request){
        $validatedData = $request->validate([
            'descricao_lesao' => 'required|string|max:255',
        ]);
        $new_lesao = [
            'descricao_lesao' => $validatedData['descricao_lesao'],
        ];
        $lesao = new TipoLesao($new_lesao);
        $lesao->save();
        return redirect()->route('read-all-tipo-lesao')->with('success', 'Local da lesão cadastrada com sucesso!');
    }

    public function readLesao(Request $request, $id){
        $lesao = Lesao::find($id);
        return $lesao;
    }

    public function readAllLocalLesoes(Request $request){
        $lesoes = LocalLesao::where('regiao_lesao', '!=', '')->get();
        return view('ferramentas.localLesao', compact('lesoes'));
    }

    public function readAllTipoLesoes(Request $request){
        $lesoes = TipoLesao::where('descricao_lesao', '!=', '')->whereNotNull('descricao_lesao')->get();
        return view('ferramentas.tipoLesao', compact('lesoes'));
    }

    public function updateLocalLesao(Request $request, $id){
        $validatedData = $request->validate([
            'regiao_lesao' => 'required|string|max:255',
        ]);
        $lesao = LocalLesao::find($id);
        $lesao->regiao_lesao = $validatedData['regiao_lesao'];
        $lesao->save();

        return redirect()->route('read-all-local-lesao')->with('success', 'Lesão atualizada com sucesso!');
    }

    public function updateTipoLesao(Request $request, $id){
        $validatedData = $request->validate([
            'descricao_lesao' => 'required|string|max:255',
        ]);
        $lesao = TipoLesao::find($id);
        $lesao->descricao_lesao = $validatedData['descricao_lesao'];
        $lesao->save();

        return redirect()->route('read-all-tipo-lesao')->with('success', 'Lesão atualizada com sucesso!');
    }

    public function deleteLocalLesao(Request $request, $id){
        $local_lesao = LocalLesao::where('id', $id)->first();

        if ($local_lesao) {
            $local_lesao->delete();
            return redirect()->route('read-all-local-lesao')->with('success', 'Lesão deletada com sucesso!');
        } else {
            return redirect()->route('read-all-local-lesao')->with('error', 'Lesão não encontrada!');
        }
    }

    public function deleteTipoLesao(Request $request, $id){
        $tipo_lesao = TipoLesao::where('id', $id)->first();

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
        $tratamento = Tratamento::where('id', $id)->first();

        if ($tratamento) {
            $tratamento->delete();
            return redirect()->route('read-all-tipo-tratamento')->with('success', 'Tratamento deletado com sucesso!');
        } else {
            return redirect()->route('read-all-tipo-tratamento')->with('error', 'Tratamento não encontrado!');
        }
    }
}
