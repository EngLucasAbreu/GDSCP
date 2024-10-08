<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteIncidenteLeitoTable extends Migration
{
    public function up()
    {
        Schema::create('paciente_incidente_leito', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_incidente');
            $table->unsignedBigInteger('id_leito');
            $table->unsignedBigInteger('id_status_paciente');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_incidente')->references('id')->on('incidentes');
            $table->foreign('id_leito')->references('id')->on('leitos');
            $table->foreign('id_status_paciente')->references('id')->on('status_paciente');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paciente_incidente_leito');
    }
}
