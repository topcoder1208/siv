<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserParametersTable extends Migration
{
    public function up()
    {
        Schema::create('user_parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipologia')->nullable();
            $table->string('parametro')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
