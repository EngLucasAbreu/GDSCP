<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(InsertSalaSeeder::class);
        $this->call(InsertLeitoSeeder::class);
        $this->call(InsertComorbidadeSeeder::class);
        $this->call(InsertLocalLesaoSeeder::class);
        $this->call(InsertTipoLesaoSeeder::class);
        $this->call(InsertTipoTratamentoSeeder::class);
        $this->call(InsertFirstUser::class);
        $this->call(InsertLesoes::class);
        $this->call(InsertPaciente::class);
        $this->call(InsertIncidente::class);
        $this->call(InsertPacienteIncidenteLeito::class);

    }
}
