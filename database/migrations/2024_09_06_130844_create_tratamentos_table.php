<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamentosTable extends Migration
{
    public function up()
    {
        Schema::create('tratamentos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_tratamento');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tratamentos');
    }
}
