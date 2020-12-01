<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGareInserimentoSoggettiTipologiumPivotTable extends Migration
{
    public function up()
    {
        Schema::create('gare_inserimento_soggetti_tipologium', function (Blueprint $table) {
            $table->unsignedBigInteger('gare_inserimento_id');
            $table->foreign('gare_inserimento_id', 'gare_inserimento_id_fk_2572414')->references('id')->on('gare_inserimentos')->onDelete('cascade');
            $table->unsignedBigInteger('soggetti_tipologium_id');
            $table->foreign('soggetti_tipologium_id', 'soggetti_tipologium_id_fk_2572414')->references('id')->on('soggetti_tipologia')->onDelete('cascade');
        });
    }
}
