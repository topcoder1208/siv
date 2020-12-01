<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenditesTable extends Migration
{
    public function up()
    {
        Schema::create('vendites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_inserimento');
            $table->time('ora_inserimento');
            $table->string('operatore')->nullable();
            $table->integer('quantita');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
