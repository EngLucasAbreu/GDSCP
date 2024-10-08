<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeitosTable extends Migration
{
    public function up()
    {
        Schema::create('leitos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_leito');
            $table->unsignedBigInteger('id_setor');
            $table->foreign('id_setor')->references('id')->on('setores');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leitos');
    }
}
