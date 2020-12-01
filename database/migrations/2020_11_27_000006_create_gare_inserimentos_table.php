<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGareInserimentosTable extends Migration
{
    public function up()
    {
        Schema::create('gare_inserimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipologia_gara');
            $table->integer('numero_fasce_previste')->nullable();
            $table->string('servizi')->nullable();
            $table->date('validita_inizio');
            $table->date('validita_fine')->nullable();
            $table->integer('metodo_attribuzione')->nullable();
            $table->string('metodo_calcolo')->nullable();
            $table->string('metodo_famiglia')->nullable();
            $table->string('titolo');
            $table->string('esito');
            $table->integer('esito_incremento')->nullable();
            $table->integer('esito_decremento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
