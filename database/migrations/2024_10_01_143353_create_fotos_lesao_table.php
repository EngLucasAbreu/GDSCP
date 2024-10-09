<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('fotos_lesao', function (Blueprint $table) {
            $table->id();
            $table->string('link_foto', 255)->nullable();
            $table->foreignId('id_lesoes')->constrained('lesoes')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fotos_lesao');
    }
}
