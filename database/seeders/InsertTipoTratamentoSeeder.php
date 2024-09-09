<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertTipoTratamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tratamentos')->insert([
            ['tipo_tratamento'=> 'Curativo'],
            ['tipo_tratamento'=> 'Cirurgia'],
            ['tipo_tratamento'=> 'Medicamento'],
            ['tipo_tratamento'=> 'Fisioterapia'],
            ['tipo_tratamento'=> 'Radioterapia'],
            ['tipo_tratamento'=> 'Quimioterapia'],
            ['tipo_tratamento'=> 'Hemodiálise'],
            ['tipo_tratamento'=> 'Hemoterapia'],
            ['tipo_tratamento'=> 'Endoscopia'],
            ['tipo_tratamento'=> 'Ultrassonografia'],
            ['tipo_tratamento'=> 'Tomografia'],
            ['tipo_tratamento'=> 'Ressonância'],
            ['tipo_tratamento'=> 'Raio-X'],
            ['tipo_tratamento'=> 'Esterilização'],
            ['tipo_tratamento'=> 'Coleta'],
            ['tipo_tratamento'=> 'Triagem'],
            ['tipo_tratamento'=> 'Reanimação'],
            ['tipo_tratamento'=> 'Vacinação'],
            ['tipo_tratamento'=> 'Isolamento'],
            ['tipo_tratamento'=> 'Emergência'],
            ['tipo_tratamento'=> 'Gesso'],
            ['tipo_tratamento'=> 'Observação'],
            ['tipo_tratamento'=> 'Exame'],
            ['tipo_tratamento'=> 'Parto'],
            ['tipo_tratamento'=> 'Recuperação'],
            ['tipo_tratamento'=> 'Observação'],
            ['tipo_tratamento'=> 'Emergência'],
            ['tipo_tratamento'=> 'Gesso'],
            ['tipo_tratamento'=> 'Observação'],
            ['tipo_tratamento'=> 'Exame'],
            ['tipo_tratamento'=> 'Parto'],
            ['tipo_tratamento'=> 'Recuperação'],
            ['tipo_tratamento'=> 'Observação'],
            ['tipo_tratamento'=> 'Emergência'],
            ['tipo_tratamento'=> 'Gesso'],
            ['tipo_tratamento'=> 'Observação'],
            ['tipo_tratamento'=> 'Exame'],
            ['tipo_tratamento'=> 'Parto'],
            ['tipo_tratamento'=> 'Recuperação'],
            ['tipo_tratamento'=> 'Observação'],
            ['tipo_tratamento'=> 'Emergência'],
        ]);
    }
}
