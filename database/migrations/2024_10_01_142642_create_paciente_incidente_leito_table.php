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
            $table->foreignId('id_paciente')->constrained('pacientes')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_incidente')->constrained('incidentes')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_leito')->constrained('leitos')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_status_paciente')->constrained('status_paciente')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paciente_incidente_leito');
    }
}
