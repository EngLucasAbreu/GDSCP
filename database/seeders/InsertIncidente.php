<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertIncidente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidentes')->insert([
            ['data_internacao' => '2024-03-03', 'saida' => '2024-09-09', 'id_lesao' => 2, 'id_tratamento' => 3, 'descricao' => 'qualquer coisa ai'],
            ['data_internacao' => '2024-04-13', 'saida' => '2024-09-09', 'id_lesao' => 3, 'id_tratamento' => 2, 'descricao' => 'qualquer coisa ai 1'],
            ['data_internacao' => '2024-05-23', 'saida' => '2024-09-09', 'id_lesao' => 4, 'id_tratamento' => 1, 'descricao' => 'qualquer coisa ai 2'],
            ['data_internacao' => '2024-06-30', 'saida' => '2024-09-09', 'id_lesao' => 5, 'id_tratamento' => 4, 'descricao' => 'qualquer coisa ai 3'],
            ['data_internacao' => '2024-07-27', 'saida' => '2024-09-09', 'id_lesao' => 6, 'id_tratamento' => 5, 'descricao' => 'qualquer coisa ai 4'],
            ['data_internacao' => '2024-08-16', 'saida' => '2024-09-09', 'id_lesao' => 7, 'id_tratamento' => 6, 'descricao' => 'qualquer coisa ai 5'],
            ['data_internacao' => '2024-09-08', 'saida' => '2024-09-09', 'id_lesao' => 8, 'id_tratamento' => 7, 'descricao' => 'qualquer coisa ai 6'],
            ['data_internacao' => '2024-02-15', 'saida' => '2024-09-09', 'id_lesao' => 9, 'id_tratamento' => 8, 'descricao' => 'qualquer coisa ai 7'],
            ['data_internacao' => '2024-01-23', 'saida' => '2024-09-09', 'id_lesao' => 1, 'id_tratamento' => 9, 'descricao' => 'qualquer coisa ai 8'],
        ]);
    }
}
