<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasLeitoStatusTable extends Migration
{
    public function up()
    {
        Schema::create('salas_leito_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sala')->constrained('salas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_leito')->constrained('leitos')->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('leito_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salas_leito_status');
    }
}
