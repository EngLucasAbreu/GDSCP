<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComorbidadeTable extends Migration
{
    public function up()
    {
        Schema::create('comorbidades', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_comorbidade')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comorbidades');
    }
}
