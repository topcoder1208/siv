<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGareInserimentoDettaglisTable extends Migration
{
    public function up()
    {
        Schema::table('gare_inserimento_dettaglis', function (Blueprint $table) {
            $table->unsignedBigInteger('gara_inserimento_id');
            $table->foreign('gara_inserimento_id', 'gara_inserimento_fk_2573645')->references('id')->on('gare_inserimentos');
        });
    }
}
