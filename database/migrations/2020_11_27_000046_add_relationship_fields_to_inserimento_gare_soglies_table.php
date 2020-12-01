<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInserimentoGareSogliesTable extends Migration
{
    public function up()
    {
        Schema::table('inserimento_gare_soglies', function (Blueprint $table) {
            $table->unsignedBigInteger('titolo_id')->nullable();
            $table->foreign('titolo_id', 'titolo_fk_2573670')->references('id')->on('gare_inserimentos');
        });
    }
}
