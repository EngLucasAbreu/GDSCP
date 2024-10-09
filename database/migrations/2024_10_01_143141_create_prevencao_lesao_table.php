<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrevencaoLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('prevencao_lesao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lesoes')->constrained('lesoes')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_prevencao')->constrained('prevencao')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prevencao_lesao');
    }
}
