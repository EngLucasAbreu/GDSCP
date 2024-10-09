<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLesoesTable extends Migration
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
            $table->foreignId('id_tipo_lesao')->constrained('tipo_lesao')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_local_lesao')->constrained('local_lesao')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_mensuracao_lesao')->constrained('mensuracao_lesao')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_insumos_lesao')->constrained('insumos_lesao')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_tipo_tratamento')->constrained('tratamento_lesao')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_cicatrizacao_lesao')->constrained('cicatrizacao_lesao')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_nutricao_lesao')->constrained('nutricao_lesao')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_termos_lesao')->constrained('termos_lesao')->onDelete('restrict')->onUpdate('cascade');
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
