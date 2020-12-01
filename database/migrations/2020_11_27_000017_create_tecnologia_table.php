<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnologiaTable extends Migration
{
    public function up()
    {
        Schema::create('tecnologia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->boolean('attivo')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
