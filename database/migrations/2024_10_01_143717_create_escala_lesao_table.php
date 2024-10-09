<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscalaLesaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escala_lesao', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['braden', 'bradenq', 'elpo']);
            $table->string('percepcao_sensorial', 255)->nullable();
            $table->string('atividade', 255)->nullable();
            $table->string('nutricao', 255)->nullable();
            $table->string('exposicao_umidade', 255)->nullable();
            $table->string('mobilidade', 255)->nullable();
            $table->string('friccao_cisalhamento', 255)->nullable();
            $table->string('perfusao_tecidual_oxigenacao', 255)->nullable(); //Para bradenq
            $table->string('posicao_cirurgica', 255)->nullable(); //Para elpo
            $table->string('tipo_anestesia', 255)->nullable(); //Para elpo
            $table->string('posicao_membros', 255)->nullable(); //Para 'elpo'
            $table->time('tempo_cirurgia')->nullable(); //Para elpo
            $table->string('superficie_suporte', 255)->nullable(); //Para elpo
            $table->foreignId('id_lesoes')->constrained('lesoes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            // Indexes
            $table->index('id_lesoes', 'fk_escala_lesoes_idx');
            $table->index('tipo', 'idx_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escala_lesao');
    }
}
