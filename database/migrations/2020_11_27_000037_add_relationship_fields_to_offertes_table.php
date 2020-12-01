<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOffertesTable extends Migration
{
    public function up()
    {
        Schema::table('offertes', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id', 'brand_fk_2564280')->references('id')->on('brands');
            $table->unsignedBigInteger('tecnologia_id');
            $table->foreign('tecnologia_id', 'tecnologia_fk_2580395')->references('id')->on('tecnologia');
        });
    }
}
