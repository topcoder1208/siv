<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProvincesTable extends Migration
{
    public function up()
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->unsignedBigInteger('regione_id')->nullable();
            $table->foreign('regione_id', 'regione_fk_2565762')->references('id')->on('regionis');
        });
    }
}
