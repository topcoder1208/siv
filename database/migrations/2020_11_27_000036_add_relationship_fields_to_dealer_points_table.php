<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDealerPointsTable extends Migration
{
    public function up()
    {
        Schema::table('dealer_points', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dealer_id')->nullable();
            $table->foreign('id_dealer_id', 'id_dealer_fk_2673672')->references('id')->on('dealers');
            $table->unsignedBigInteger('citta_id')->nullable();
            $table->foreign('citta_id', 'citta_fk_2673678')->references('id')->on('citta');
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->foreign('provincia_id', 'provincia_fk_2673679')->references('id')->on('provinces');
        });
    }
}
