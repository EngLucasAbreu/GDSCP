<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('lesoes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_lesao');
            $table->string('local_lesao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lesoes');
    }
}
