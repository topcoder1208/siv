<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrabDataMexalsTable extends Migration
{
    public function up()
    {
        Schema::create('grab_data_mexals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomefile')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
