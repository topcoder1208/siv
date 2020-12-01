<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDealerMandatisTable extends Migration
{
    public function up()
    {
        Schema::table('dealer_mandatis', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_2673780')->references('id')->on('brands');
            $table->unsignedBigInteger('id_dealer_id')->nullable();
            $table->foreign('id_dealer_id', 'id_dealer_fk_2673784')->references('id')->on('dealers');
        });
    }
}
