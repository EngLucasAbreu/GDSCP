<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->bigInteger('cns');
            $table->date('data_nascimento');
            $table->enum('sexo', ['M', 'F', 'O', 'N']);
            $table->boolean('evolucao');
            $table->unsignedBigInteger('id_comorbidade');
            $table->foreign('id_comorbidade')->references('id')->on('comorbidades');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
