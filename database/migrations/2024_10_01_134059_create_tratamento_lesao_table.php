<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamentoLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('tratamento_lesao', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_tratamento', 45)->nullable();
            $table->date('data_tratamento')->nullable();
            $table->string('higienizacao', 45)->nullable();
            $table->string('cobertura', 45)->nullable();
            $table->string('limpeza', 45)->nullable();
            $table->string('correlato', 45)->nullable();
            $table->string('descricao_lesao', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tratamento_lesao');
    }
}
