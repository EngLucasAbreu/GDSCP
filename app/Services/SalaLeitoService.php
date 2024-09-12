<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SetorLeitoService
{
    public function getLeitosComSetores()
    {
        return DB::table('leitos')
            ->join('setores', 'leitos.id_setor', '=', 'setores.id')
            ->select('leitos.tipo_leito', 'setores.nome_setor')
            ->get();
    }
}
