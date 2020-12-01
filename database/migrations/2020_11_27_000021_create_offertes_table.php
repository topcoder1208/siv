<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffertesTable extends Migration
{
    public function up()
    {
        Schema::create('offertes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->unique();
            $table->date('fine_validita')->nullable();
            $table->date('inizio_validita')->nullable();
            $table->string('tipologia');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
