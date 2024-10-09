<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCicatrizacaoLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('cicatrizacao_lesao', function (Blueprint $table) {
            $table->id();
            $table->boolean('vancouver')->nullable();
            $table->boolean('push')->nullable();
            $table->string('pigmentacao', 45)->nullable();
            $table->string('flexibilidade', 45)->nullable();
            $table->string('vascularizacao', 45)->nullable();
            $table->string('altura', 45)->nullable();
            $table->boolean('lesao_cicatrizada')->nullable();
            $table->date('data_cicatrizacao')->nullable();
            $table->string('cobertura', 45)->nullable();
            $table->string('fitoterapico', 45)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cicatrizacao_lesao');
    }
}
