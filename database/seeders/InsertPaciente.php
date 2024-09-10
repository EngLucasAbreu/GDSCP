<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertPaciente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            ['nome' => 'João', 'cpf' => '12345678910', 'cns' => '123123112311124', 'data_nascimento' => '1990-01-01', 'sexo' => 'M', 'evolucao' => true, 'id_comorbidade' => 1],
            ['nome' => 'Maria', 'cpf' => '10987654321', 'cns' => '123124112111135', 'data_nascimento' => '1995-01-01', 'sexo' => 'F', 'evolucao' => false, 'id_comorbidade' => 2],
            ['nome' => 'José', 'cpf' => '12345678910', 'cns' => '123123112311134', 'data_nascimento' => '2000-01-01', 'sexo' => 'M', 'evolucao' => true, 'id_comorbidade' => 3],
            ['nome' => 'Ana', 'cpf' => '10987654321', 'cns' => '123123421341111', 'data_nascimento' => '2005-01-01', 'sexo' => 'F', 'evolucao' => false, 'id_comorbidade' => 4],
            ['nome' => 'Pedro', 'cpf' => '12345678910', 'cns' => '123124112111234', 'data_nascimento' => '2010-01-01', 'sexo' => 'M', 'evolucao' => true, 'id_comorbidade' => 5],
            ['nome' => 'Carla', 'cpf' => '10987654321', 'cns' => '123124112111334', 'data_nascimento' => '2015-01-01', 'sexo' => 'F', 'evolucao' => false, 'id_comorbidade' => 6],
            ['nome' => 'Paulo', 'cpf' => '12345678910', 'cns' => '123124112111434', 'data_nascimento' => '2020-01-01', 'sexo' => 'M', 'evolucao' => true, 'id_comorbidade' => 7],
            ['nome' => 'Mariana', 'cpf' => '10987654321', 'cns' => '123213411111234', 'data_nascimento' => '2025-01-01', 'sexo' => 'F', 'evolucao' => false, 'id_comorbidade' => 8],
            ['nome' => 'Lucas', 'cpf' => '12345678910', 'cns' => '123124112111534', 'data_nascimento' => '2030-01-01', 'sexo' => 'M', 'evolucao' => true, 'id_comorbidade' => 9],
            ['nome' => 'Juliana', 'cpf' => '10987654321', 'cns' => '123213411141234', 'data_nascimento' => '2035-01-01', 'sexo' => 'F', 'evolucao' => false, 'id_comorbidade' => 10]
        ]);
    }
}
