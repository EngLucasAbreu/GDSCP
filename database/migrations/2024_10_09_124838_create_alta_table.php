<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAltaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alta', function (Blueprint $table) {
            $table->id();
            $table->enum('motivo_alta', ['alta_melhorada', 'alta_transferencia', 'alta_obito']);
            $table->string('descricao', 255)->nullable();
            $table->date('data_alta');
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alta');
    }
}
