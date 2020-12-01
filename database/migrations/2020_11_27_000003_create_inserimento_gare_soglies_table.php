<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInserimentoGareSogliesTable extends Migration
{
    public function up()
    {
        Schema::create('inserimento_gare_soglies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('premio')->nullable();
            $table->string('servizio')->nullable();
            $table->integer('percentuale')->nullable();
            $table->integer('quantita')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
