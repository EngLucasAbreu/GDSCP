<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermosLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('termos_lesao', function (Blueprint $table) {
            $table->id();
            $table->boolean('autorizacao_imagem')->nullable();
            $table->string('termo_imagem', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('termos_lesao');
    }
}
