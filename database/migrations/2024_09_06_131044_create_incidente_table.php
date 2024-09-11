<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenteTable extends Migration
{
    public function up()
    {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->id();
            $table->date('data_evento');
            $table->unsignedBigInteger('id_lesao');
            $table->unsignedBigInteger('id_tratamento');
            $table->string('descricao');
            $table->foreign('id_lesao')->references('id')->on('lesoes');
            $table->foreign('id_tratamento')->references('id')->on('tratamentos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incidentes');
    }
}
