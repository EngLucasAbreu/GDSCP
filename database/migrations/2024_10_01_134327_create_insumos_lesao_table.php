<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('insumos_lesao', function (Blueprint $table) {
            $table->id();
            $table->boolean('oclusao')->nullable();
            $table->boolean('fixacao')->nullable();
            $table->string('insumo', 45)->nullable();
            $table->string('quantidade', 45);
            $table->string('tamanho', 45)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insumos_lesao');
    }
}
