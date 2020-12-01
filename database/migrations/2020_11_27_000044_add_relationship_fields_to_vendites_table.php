<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVenditesTable extends Migration
{
    public function up()
    {
        Schema::table('vendites', function (Blueprint $table) {
            $table->unsignedBigInteger('servizio_id')->nullable();
            $table->foreign('servizio_id', 'servizio_fk_2566289')->references('id')->on('offertes');
            $table->unsignedBigInteger('id_agente_id')->nullable();
            $table->foreign('id_agente_id', 'id_agente_fk_2673721')->references('id')->on('agentis');
            $table->unsignedBigInteger('id_point_id')->nullable();
            $table->foreign('id_point_id', 'id_point_fk_2673722')->references('id')->on('dealer_points');
        });
    }
}
