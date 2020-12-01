<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoggettiFatturatosTable extends Migration
{
    public function up()
    {
        Schema::create('soggetti_fatturatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anno')->nullable();
            $table->integer('mese')->nullable();
            $table->decimal('telefoni', 15, 2)->nullable();
            $table->decimal('card', 15, 2)->nullable();
            $table->decimal('servizi', 15, 2)->nullable();
            $table->decimal('altro', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
