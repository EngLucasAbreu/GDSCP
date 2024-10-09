<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentesTable extends Migration
{
    public function up()
    {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->id();
            $table->date('data_internacao');
            $table->date('data_evento');
            $table->foreignId('id_lesao')->constrained('lesoes')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_tratamento')->constrained('tratamento_lesao')->onDelete('restrict')->onUpdate('cascade');
            $table->string('descricao', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incidentes');
    }
}
