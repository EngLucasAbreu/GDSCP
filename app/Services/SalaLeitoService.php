<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SalaLeitoService
{
    public function getLeitosComSalas()
    {
        return DB::table('leitos')
            ->join('salas', 'leitos.id_sala', '=', 'salas.id')
            ->select('leitos.tipo_leito', 'salas.nome_sala')
            ->get();
    }
}
