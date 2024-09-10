<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertLesoes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesoes')->insert([
            ['id_tipo_lesao' => 1, 'id_local_lesao' => 1],
            ['id_tipo_lesao' => 2, 'id_local_lesao' => 2],
            ['id_tipo_lesao' => 3, 'id_local_lesao' => 3],
            ['id_tipo_lesao' => 4, 'id_local_lesao' => 4],
            ['id_tipo_lesao' => 5, 'id_local_lesao' => 5],
            ['id_tipo_lesao' => 6, 'id_local_lesao' => 6],
            ['id_tipo_lesao' => 7, 'id_local_lesao' => 7],
            ['id_tipo_lesao' => 8, 'id_local_lesao' => 8],
            ['id_tipo_lesao' => 9, 'id_local_lesao' => 9],
            ['id_tipo_lesao' => 10, 'id_local_lesao' => 10]
        ]);
    }
}
