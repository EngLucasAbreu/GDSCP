<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertStatusPaciente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_paciente')->insert([
            ['paciente_alta' => false, 'data_internacao' => '2021-09-06', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-08-16', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-07-14', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-06-23', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-05-22', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-04-12', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-03-01', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-02-20', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-01-26', 'data_alta' => null],
            ['paciente_alta' => false, 'data_internacao' => '2021-09-16', 'data_alta' => null],
        ]);
    }
}
