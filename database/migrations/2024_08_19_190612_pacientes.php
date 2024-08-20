<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->date('data_nascimento');
        $table->string('cpf')->unique();
        $table->string('cns')->unique();
        $table->enum('sexo', ['masculino', 'feminino', 'outro']);
        $table->boolean('comorbidade')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
