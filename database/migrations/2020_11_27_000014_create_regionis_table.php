<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionisTable extends Migration
{
    public function up()
    {
        Schema::create('regionis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('regione');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
