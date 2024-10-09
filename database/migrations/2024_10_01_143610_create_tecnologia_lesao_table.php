<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnologiaLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('tecnologia_lesao', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', [
                'terapia_pressao',
                'desbridamento',
                'ozonio_terapia',
                'laser',
                'prf_prp'
            ])->notNullable();
            $table->integer('sessoes')->nullable();
            $table->string('tamanho_esponja', 45)->nullable();
            $table->string('pressao_mercurio', 45)->nullable();
            $table->integer('aplicacoes')->nullable();
            $table->integer('quantidade_sessoes')->nullable();
            $table->integer('jaules')->nullable();
            $table->integer('oxigenio_litros_minuto')->nullable();
            $table->integer('pontos_aplicacao')->nullable();
            $table->integer('liquido')->nullable();
            $table->integer('megamembrana')->nullable();
            $table->foreignId('lesao_id')->constrained('lesoes')->onDelete('cascade')->onUpdate('cascade'); // Relacionamento com lesao
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tecnologia_lesao');
    }
}
