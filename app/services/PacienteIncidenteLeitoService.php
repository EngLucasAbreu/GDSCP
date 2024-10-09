<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PacienteIncidenteLeitoService
{
    public function getIncidentesLeitos($nome = null, $cpf = null)
    {
        $query = DB::table('paciente_incidente_leito as pil')
            ->join('pacientes as p', 'pil.id_paciente', '=', 'p.id')
            ->join('incidentes as i', 'pil.id_incidente', '=', 'i.id')
            ->join('leitos as l', 'pil.id_leito', '=', 'l.id')
            ->join('salas as s', 'l.id_sala', '=', 's.id')
            ->select(
                'p.nome',
                'i.data_internacao',
                's.nome_sala',
                'l.tipo_leito'
            );

        // Aplicando filtros opcionais
        if (!empty($nome)) {
            $query->where('p.nome', 'LIKE', '%' . $nome . '%');
        }

        if (!empty($cpf)) {
            $query->where('p.cpf', '=', $cpf);
        }

        return $query->get();
    }
}
