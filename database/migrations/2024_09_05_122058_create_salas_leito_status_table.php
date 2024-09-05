<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasLeitoStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas_leito_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sala');
            $table->unsignedBigInteger('id_leito');
            $table->boolean('leito_status');
            $table->foreign('id_sala')->references('id')->on('leitos');
            $table->foreign('id_leito')->references('id')->on('leitos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salas_leito_status');
    }
}
