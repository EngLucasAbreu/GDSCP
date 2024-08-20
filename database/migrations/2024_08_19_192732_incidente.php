<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Incidente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('incidentes', function (Blueprint $table) {
        $table->id();
        $table->date('data_internacao');
        $table->date('data_evento');
        $table->foreignId('sala_id')->constrained('salas')->onDelete('cascade');
        $table->foreignId('leito_id')->constrained('leitos')->onDelete('cascade');
        $table->enum('local_lesao', ['cabeça', 'ombro', 'abdomen', 'perna', 'braço', 'peito', 'costas']);
        $table->enum('tipo_lesao', ['ferida cirúrgica', 'úlcera', 'queimadura', 'luxação', 'fratura']);
        $table->enum('tipo_tratamento', ['curativo', 'medicamento', 'fisioterapia', 'cirurgia']);
        $table->text('descricao');
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
        Schema::dropIfExists('incidentes');
    }
}
