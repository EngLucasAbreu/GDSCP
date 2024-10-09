<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalLesaoTable extends Migration
{
    public function up()
    {
        Schema::create('local_lesao', function (Blueprint $table) {
            $table->id();
            $table->string('regiao_lesao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_lesao');
    }
}
