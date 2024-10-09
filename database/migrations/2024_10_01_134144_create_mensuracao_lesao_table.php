<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensuracaoLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('mensuracao_lesao', function (Blueprint $table) {
            $table->id();
            $table->string('tamanho_lesao', 45)->nullable();
            $table->string('largura_lesao', 45)->nullable();
            $table->string('comprimento_lesao', 45)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensuracao_lesao');
    }
}
