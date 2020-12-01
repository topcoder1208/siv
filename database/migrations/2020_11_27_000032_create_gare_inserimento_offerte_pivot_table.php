<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGareInserimentoOffertePivotTable extends Migration
{
    public function up()
    {
        Schema::create('gare_inserimento_offerte', function (Blueprint $table) {
            $table->unsignedBigInteger('gare_inserimento_id');
            $table->foreign('gare_inserimento_id', 'gare_inserimento_id_fk_2572417')->references('id')->on('gare_inserimentos')->onDelete('cascade');
            $table->unsignedBigInteger('offerte_id');
            $table->foreign('offerte_id', 'offerte_id_fk_2572417')->references('id')->on('offertes')->onDelete('cascade');
        });
    }
}
