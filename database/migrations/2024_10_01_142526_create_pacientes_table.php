<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('cpf', 255);
            $table->bigInteger('cns');
            $table->date('data_nascimento');
            $table->enum('sexo', ['M', 'F', 'O', 'N']);
            $table->boolean('evolucao');
            $table->foreignId('id_comorbidade')->constrained('comorbidades')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
