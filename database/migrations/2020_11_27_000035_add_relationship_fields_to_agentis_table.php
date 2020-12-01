<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAgentisTable extends Migration
{
    public function up()
    {
        Schema::table('agentis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_brand_id');
            $table->foreign('id_brand_id', 'id_brand_fk_2673707')->references('id')->on('brands');
            $table->unsignedBigInteger('citta_id')->nullable();
            $table->foreign('citta_id', 'citta_fk_2673713')->references('id')->on('citta');
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->foreign('provincia_id', 'provincia_fk_2673714')->references('id')->on('provinces');
        });
    }
}
