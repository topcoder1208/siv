<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealersTable extends Migration
{
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dealer');
            $table->string('indirizzo')->nullable();
            $table->string('cap')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('conto_contabilita')->nullable();
            $table->string('codice')->nullable();
            $table->string('stato')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
