<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoggettiTipologiaTable extends Migration
{
    public function up()
    {
        Schema::create('soggetti_tipologia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipologia')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
