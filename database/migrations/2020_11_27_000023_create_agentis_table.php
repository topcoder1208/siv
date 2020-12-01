<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentisTable extends Migration
{
    public function up()
    {
        Schema::create('agentis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codice')->nullable();
            $table->string('agente');
            $table->string('conto_contabilita')->nullable();
            $table->string('indirizzo')->nullable();
            $table->string('cap')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('agenzia_responsabile')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
