<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotiziesTable extends Migration
{
    public function up()
    {
        Schema::create('notizies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titolo')->nullable();
            $table->longText('descrizione_breve')->nullable();
            $table->date('inizio_visualizzazione');
            $table->date('fine_visualizzazione')->nullable();
            $table->date('visualizza_primapagina')->nullable();
            $table->string('link')->nullable();
            $table->string('autorizzati')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
