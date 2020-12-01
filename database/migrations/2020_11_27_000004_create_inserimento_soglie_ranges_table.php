<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInserimentoSoglieRangesTable extends Migration
{
    public function up()
    {
        Schema::create('inserimento_soglie_ranges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('percentuale')->nullable();
            $table->float('soglia_minima', 8, 2)->nullable();
            $table->float('soglia_massima', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
