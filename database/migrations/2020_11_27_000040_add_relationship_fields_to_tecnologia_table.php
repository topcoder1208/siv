<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTecnologiaTable extends Migration
{
    public function up()
    {
        Schema::table('tecnologia', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id', 'categoria_fk_2564487')->references('id')->on('categories');
        });
    }
}
