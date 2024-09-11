<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PacienteIncidenteLeitoService
{
    public function getIncidentesLeitos($nome = null, $cpf = null)
    {
        Log::info('Nome:', ['nome' => $nome]);
        Log::info('CPF:', ['cpf' => $cpf]);

        $query = DB::table('paciente_incidente_leito as pil')
            ->join('pacientes as p', 'pil.id_paciente', '=', 'p.id')
            ->join('incidentes as i', 'pil.id_incidente', '=', 'i.id')
            ->join('leitos as l', 'pil.id_leito', '=', 'l.id')
            ->join('salas as s', 'l.id_sala', '=', 's.id')
            ->select(
                'p.id',
                'p.nome',
                DB::raw('MAX(i.data_internacao) as data_internacao'),
                'i.data_internacao',
                's.nome_sala',
                'l.tipo_leito'
            )
            ->groupBy('p.id', 'p.nome', 'i.data_internacao', 's.nome_sala', 'l.tipo_leito');

        // Verifica se $nome não está vazio
        if ($nome !== null && $nome !== '') {
            $query->where('p.nome', 'LIKE', '%' . $nome . '%');
        }

        // Verifica se $cpf não está vazio
        if ($cpf !== null && $cpf !== '') {
            $query->where('p.cpf', '=', $cpf);
        }

        $result = $query->get();

        Log::info('Result:', ['result' => $result]);

        return $result;
    }

}
