<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerPointsTable extends Migration
{
    public function up()
    {
        Schema::create('dealer_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('conto_contabilita')->nullable();
            $table->string('codice');
            $table->string('point');
            $table->string('indirizzo')->nullable();
            $table->string('cap')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
