<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicacaoLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('medicacao_lesao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lesoes')->constrained('lesoes')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_medicacao')->constrained('medicacao')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicacao_lesao');
    }
}
