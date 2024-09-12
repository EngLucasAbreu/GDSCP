<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetoresLeitoStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setores_leito_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_setor');
            $table->unsignedBigInteger('id_leito');
            $table->boolean('leito_status');
            $table->foreign('id_setor')->references('id')->on('leitos');
            $table->foreign('id_leito')->references('id')->on('leitos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('setores_leito_status');
    }
}
