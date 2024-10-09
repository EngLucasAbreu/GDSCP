<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicacaoTable extends Migration
{
    public function up()
    {
        Schema::create('medicacao', function (Blueprint $table) {
            $table->id();
            $table->boolean('uso_medicamento')->nullable();
            $table->string('medicamento', 255)->nullable();
            $table->string('volume', 255)->nullable();
            $table->string('posologia', 255)->nullable();
            $table->string('descricao', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicacao');
    }
}
