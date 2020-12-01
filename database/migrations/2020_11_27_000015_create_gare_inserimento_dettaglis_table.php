<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGareInserimentoDettaglisTable extends Migration
{
    public function up()
    {
        Schema::create('gare_inserimento_dettaglis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipologia')->nullable();
            $table->integer('valore_n_1')->nullable();
            $table->integer('valore_n_2')->nullable();
            $table->string('descrizione_valore')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
