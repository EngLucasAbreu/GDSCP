<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertPacienteIncidenteLeito extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paciente_incidente_leito')->insert([
            ['id_paciente' => 1, 'id_incidente' => 1, 'id_leito' => 1],
            ['id_paciente' => 2, 'id_incidente' => 2, 'id_leito' => 2],
            ['id_paciente' => 3, 'id_incidente' => 3, 'id_leito' => 3],
            ['id_paciente' => 4, 'id_incidente' => 4, 'id_leito' => 4],
            ['id_paciente' => 5, 'id_incidente' => 5, 'id_leito' => 5],
            ['id_paciente' => 6, 'id_incidente' => 6, 'id_leito' => 6],
            ['id_paciente' => 7, 'id_incidente' => 7, 'id_leito' => 7],
            ['id_paciente' => 8, 'id_incidente' => 8, 'id_leito' => 8],
            ['id_paciente' => 9, 'id_incidente' => 9, 'id_leito' => 9]
        ]);
    }
}
