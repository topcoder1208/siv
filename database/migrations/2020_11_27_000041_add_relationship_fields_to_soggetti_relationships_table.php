<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSoggettiRelationshipsTable extends Migration
{
    public function up()
    {
        Schema::table('soggetti_relationships', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_2630889')->references('id')->on('brands');
            $table->unsignedBigInteger('id_dealer_id')->nullable();
            $table->foreign('id_dealer_id', 'id_dealer_fk_2673778')->references('id')->on('dealers');
        });
    }
}
