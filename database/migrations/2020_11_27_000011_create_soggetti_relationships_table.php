<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoggettiRelationshipsTable extends Migration
{
    public function up()
    {
        Schema::create('soggetti_relationships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('inizio')->nullable();
            $table->date('fine')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
