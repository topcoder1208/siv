<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDealersTable extends Migration
{
    public function up()
    {
        Schema::table('dealers', function (Blueprint $table) {
            $table->unsignedBigInteger('citta_id')->nullable();
            $table->foreign('citta_id', 'citta_fk_2673662')->references('id')->on('citta');
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->foreign('provincia_id', 'provincia_fk_2673663')->references('id')->on('provinces');
        });
    }
}
