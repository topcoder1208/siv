<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCittaTable extends Migration
{
    public function up()
    {
        Schema::create('citta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cap');
            $table->string('citta');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
