<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertLocalLesaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('local_lesoes')->insert([
            ['regiao_lesao'=> 'Cabeça'],
            ['regiao_lesao'=> 'Pescoço'],
            ['regiao_lesao'=> 'Tronco'],
            ['regiao_lesao'=> 'Membro Superior'],
            ['regiao_lesao'=> 'Membro Inferior'],
            ['regiao_lesao'=> 'Mão'],
            ['regiao_lesao'=> 'Pé'],
            ['regiao_lesao'=> 'Face'],
            ['regiao_lesao'=> 'Olho'],
            ['regiao_lesao'=> 'Orelha'],
            ['regiao_lesao'=> 'Nariz'],
            ['regiao_lesao'=> 'Boca'],
            ['regiao_lesao'=> 'Lábio'],
            ['regiao_lesao'=> 'Língua'],
            ['regiao_lesao'=> 'Garganta'],
            ['regiao_lesao'=> 'Axila'],
            ['regiao_lesao'=> 'Virilha'],
            ['regiao_lesao'=> 'Umbigo'],
            ['regiao_lesao'=> 'Costas'],
            ['regiao_lesao'=> 'Barriga'],
            ['regiao_lesao'=> 'Nádegas'],
            ['regiao_lesao'=> 'Coxa'],
            ['regiao_lesao'=> 'Panturrilha'],
            ['regiao_lesao'=> 'Joelho'],
            ['regiao_lesao'=> 'Cotovelo'],
            ['regiao_lesao'=> 'Pulso'],
            ['regiao_lesao'=> 'Tornozelo'],
            ['regiao_lesao'=> 'Dedo'],
            ['regiao_lesao'=> 'Unha'],
            ['regiao_lesao'=> 'Calcanhar'],
            ['regiao_lesao'=> 'Couro Cabeludo'],
            ['regiao_lesao'=> 'Axila'],
            ['regiao_lesao'=> 'Virilha'],
            ['regiao_lesao'=> 'Umbigo'],
            ['regiao_lesao'=> 'Costas'],
            ['regiao_lesao'=> 'Barriga'],
            ['regiao_lesao'=> 'Nádegas'],
            ['regiao_lesao'=> 'Coxa'],
        ]);
    }
}
