<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertTipoLesaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_lesoes')->insert([
            ['descricao_lesao'=> 'Ferida'],
            ['descricao_lesao'=> 'Queimadura'],
            ['descricao_lesao'=> 'Corte'],
            ['descricao_lesao'=> 'Escoriação'],
            ['descricao_lesao'=> 'Hematoma'],
            ['descricao_lesao'=> 'Equimose'],
            ['descricao_lesao'=> 'Edema'],
            ['descricao_lesao'=> 'Eritema'],
            ['descricao_lesao'=> 'Vesícula'],
            ['descricao_lesao'=> 'Pústula'],
            ['descricao_lesao'=> 'Úlcera'],
            ['descricao_lesao'=> 'Necrose'],
            ['descricao_lesao'=> 'Gangrena'],
            ['descricao_lesao'=> 'Fissura'],
            ['descricao_lesao'=> 'Fístula'],
            ['descricao_lesao'=> 'Abscesso'],
            ['descricao_lesao'=> 'Hérnia'],
            ['descricao_lesao'=> 'Tumor'],
            ['descricao_lesao'=> 'Cisto'],
            ['descricao_lesao'=> 'Pólipo'],
            ['descricao_lesao'=> 'Calázio'],
            ['descricao_lesao'=> 'Hemangioma'],
            ['descricao_lesao'=> 'Linfangioma'],
            ['descricao_lesao'=> 'Lipoma'],
            ['descricao_lesao'=> 'Nevo'],
            ['descricao_lesao'=> 'Papiloma'],
            ['descricao_lesao'=> 'Verruga'],
            ['descricao_lesao'=> 'Queloide'],
            ['descricao_lesao'=> 'Cicatriz'],
            ['descricao_lesao'=> 'Estrias'],
            ['descricao_lesao'=> 'Celulite'],
            ['descricao_lesao'=> 'Erisipela'],
            ['descricao_lesao'=> 'Micose'],
            ['descricao_lesao'=> 'Impetigo'],
            ['descricao_lesao'=> 'Herpes'],
            ['descricao_lesao'=> 'Psoríase'],
            ['descricao_lesao'=> 'Dermatite'],
            ['descricao_lesao'=> 'Urticária'],
            ['descricao_lesao'=> 'Eczema'],
            ['descricao_lesao'=> 'Acne'],
        ]);
    }
}
