<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertSetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setores')->insert([
            ['nome_setor'=> 'Setor de Parto'],
            ['nome_setor'=> 'Setor de Recuperação'],
            ['nome_setor'=> 'Setor de Cirurgia'],
            ['nome_setor'=> 'Setor de Curativo'],
            ['nome_setor'=> 'Setor de Vacinação'],
            ['nome_setor'=> 'Setor de Exame'],
            ['nome_setor'=> 'Setor de Observação'],
            ['nome_setor'=> 'Setor de Isolamento'],
            ['nome_setor'=> 'Setor de Emergência'],
            ['nome_setor'=> 'Setor de Gesso'],
            ['nome_setor'=> 'Setor de Raio-X'],
            ['nome_setor'=> 'Setor de Esterilização'],
            ['nome_setor'=> 'Setor de Coleta'],
            ['nome_setor'=> 'Setor de Triagem'],
            ['nome_setor'=> 'Setor de Reanimação'],
            ['nome_setor'=> 'Setor de Hemodiálise'],
            ['nome_setor'=> 'Setor de Hemoterapia'],
            ['nome_setor'=> 'Setor de Quimioterapia'],
            ['nome_setor'=> 'Setor de Endoscopia'],
            ['nome_setor'=> 'Setor de Ultrassonografia'],
            ['nome_setor'=> 'Setor de Tomografia'],
            ['nome_setor'=> 'Setor de Ressonância'],
            ['nome_setor'=> 'UTI Adulto'],
            ['nome_setor'=> 'UTI Pediátrica'],
            ['nome_setor'=> 'UTI Neonatal'],
            ['nome_setor'=> 'UTI Cardíaca'],
            ['nome_setor'=> 'CTI ']
        ]);
    }
}
