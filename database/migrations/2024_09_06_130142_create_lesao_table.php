<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLesaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipo_lesao');
            $table->unsignedBigInteger('id_local_lesao');
            $table->foreign('id_tipo_lesao')->references('id')->on('tipo_lesoes');
            $table->foreign('id_local_lesao')->references('id')->on('local_lesoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesoes');
    }
}
