<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteIncidenteSalaTable extends Migration
{
    public function up()
    {
        Schema::create('paciente_incidente_sala', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_incidente');
            $table->unsignedBigInteger('id_sala');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_incidente')->references('id')->on('incidentes');
            $table->foreign('id_sala')->references('id')->on('salas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paciente_incidente_sala');
    }
}
