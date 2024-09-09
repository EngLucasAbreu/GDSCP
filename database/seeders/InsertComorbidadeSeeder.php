<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertComorbidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comorbidades')->insert([
            ['tipo_comorbidade'=> 'Diabetes'],
            ['tipo_comorbidade'=> 'Hipertensão'],
            ['tipo_comorbidade'=> 'Obesidade'],
            ['tipo_comorbidade'=> 'Doença Cardíaca'],
            ['tipo_comorbidade'=> 'Doença Pulmonar'],
            ['tipo_comorbidade'=> 'Doença Renal'],
            ['tipo_comorbidade'=> 'Doença Hepática'],
            ['tipo_comorbidade'=> 'Doença Neurológica'],
            ['tipo_comorbidade'=> 'Doença Autoimune'],
            ['tipo_comorbidade'=> 'Doença Hematológica'],
            ['tipo_comorbidade'=> 'Doença Oncológica'],
            ['tipo_comorbidade'=> 'Doença Infecciosa'],
            ['tipo_comorbidade'=> 'Doença Reumática'],
            ['tipo_comorbidade'=> 'Doença Gastrointestinal'],
            ['tipo_comorbidade'=> 'Doença Endócrina'],
            ['tipo_comorbidade'=> 'Doença Dermatológica'],
            ['tipo_comorbidade'=> 'Doença Oftalmológica'],
            ['tipo_comorbidade'=> 'Doença Otorrinolaringológica'],
            ['tipo_comorbidade'=> 'Doença Urológica'],
            ['tipo_comorbidade'=> 'Doença Ginecológica'],
            ['tipo_comorbidade'=> 'Doença Obstétrica'],
            ['tipo_comorbidade'=> 'Doença Ortopédica'],
            ['tipo_comorbidade'=> 'Doença Traumática'],
            ['tipo_comorbidade'=> 'Doença Psiquiátrica'],
            ['tipo_comorbidade'=> 'Doença Inflamatória'],
            ['tipo_comorbidade'=> 'Doença Vascular'],
            ['tipo_comorbidade'=> 'Doença Genética'],
            ['tipo_comorbidade'=> 'Doença Metabólica'],
            ['tipo_comorbidade'=> 'Doença Nutricional'],
            ['tipo_comorbidade'=> 'Doença Ambiental'],
            ['tipo_comorbidade'=> 'Doença Profissional'],
            ['tipo_comorbidade'=> 'Doença Iatrogênica'],
            ['tipo_comorbidade'=> 'Doença Idiopática'],
            ['tipo_comorbidade'=> 'Doença Rara'],
        ]);
    }
}
