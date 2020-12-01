<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCittaTable extends Migration
{
    public function up()
    {
        Schema::table('citta', function (Blueprint $table) {
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->foreign('provincia_id', 'provincia_fk_2565769')->references('id')->on('provinces');
        });
    }
}
