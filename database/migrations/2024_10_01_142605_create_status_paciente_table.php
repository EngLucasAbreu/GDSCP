<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPacienteTable extends Migration
{
    public function up()
    {
        Schema::create('status_paciente', function (Blueprint $table) {
            $table->id();
            $table->date('data_internacao');
            $table->date('data_alta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_paciente');
    }
}
