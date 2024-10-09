<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_lesao', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_lesao')->nullable();
            $table->string('tipo_borda')->nullable();
            $table->string('tipo_exsudato')->nullable();
            $table->string('caracteristica_perilesional')->nullable();
            $table->string('descricao_lesao')->nullable();
            $table->string('classificacao_ferida')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_lesao');
    }
}
