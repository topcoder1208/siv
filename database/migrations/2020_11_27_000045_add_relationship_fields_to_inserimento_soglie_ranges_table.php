<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInserimentoSoglieRangesTable extends Migration
{
    public function up()
    {
        Schema::table('inserimento_soglie_ranges', function (Blueprint $table) {
            $table->unsignedBigInteger('gara_id')->nullable();
            $table->foreign('gara_id', 'gara_fk_2573681')->references('id')->on('gare_inserimentos');
        });
    }
}
