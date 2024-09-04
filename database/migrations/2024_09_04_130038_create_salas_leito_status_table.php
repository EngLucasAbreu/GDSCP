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
            $table->unsignedBigInteger('id_sala');
            $table->unsignedBigInteger('id_leito');
            $table->boolean('leito_status');
            $table->foreign('id_sala')->references('id')->on('leitos');
            $table->foreign('id_leito')->references('id')->on('leitos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salas_leito_status');
    }
}
