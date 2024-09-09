<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertSalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salas')->insert([
            ['nome_sala'=> 'Sala de Parto'],
            ['nome_sala'=> 'Sala de Recuperação'],
            ['nome_sala'=> 'Sala de Cirurgia'],
            ['nome_sala'=> 'Sala de Curativo'],
            ['nome_sala'=> 'Sala de Vacinação'],
            ['nome_sala'=> 'Sala de Exame'],
            ['nome_sala'=> 'Sala de Observação'],
            ['nome_sala'=> 'Sala de Isolamento'],
            ['nome_sala'=> 'Sala de Emergência'],
            ['nome_sala'=> 'Sala de Gesso'],
            ['nome_sala'=> 'Sala de Raio-X'],
            ['nome_sala'=> 'Sala de Esterilização'],
            ['nome_sala'=> 'Sala de Coleta'],
            ['nome_sala'=> 'Sala de Triagem'],
            ['nome_sala'=> 'Sala de Reanimação'],
            ['nome_sala'=> 'Sala de Hemodiálise'],
            ['nome_sala'=> 'Sala de Hemoterapia'],
            ['nome_sala'=> 'Sala de Quimioterapia'],
            ['nome_sala'=> 'Sala de Endoscopia'],
            ['nome_sala'=> 'Sala de Ultrassonografia'],
            ['nome_sala'=> 'Sala de Tomografia'],
            ['nome_sala'=> 'Sala de Ressonância'],
            ['nome_sala'=> 'UTI Adulto'],
            ['nome_sala'=> 'UTI Pediátrica'],
            ['nome_sala'=> 'UTI Neonatal'],
            ['nome_sala'=> 'UTI Cardíaca'],
            ['nome_sala'=> 'CTI ']
        ]);
    }
}
