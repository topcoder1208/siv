<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieGareInserimentoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('categorie_gare_inserimento', function (Blueprint $table) {
            $table->unsignedBigInteger('gare_inserimento_id');
            $table->foreign('gare_inserimento_id', 'gare_inserimento_id_fk_2572310')->references('id')->on('gare_inserimentos')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id', 'categorie_id_fk_2572310')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
