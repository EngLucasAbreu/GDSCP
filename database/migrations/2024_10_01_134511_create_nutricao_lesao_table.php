<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutricaoLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('nutricao_lesao', function (Blueprint $table) {
            $table->id();
            $table->string('suporte_nutricional', 45)->nullable();
            $table->string('descricao_alimentacao', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nutricao_lesao');
    }
}
