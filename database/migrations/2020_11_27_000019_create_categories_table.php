<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->boolean('attivo')->default(0)->nullable();
            $table->string('tipologia')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('tecnologia_modalita_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
