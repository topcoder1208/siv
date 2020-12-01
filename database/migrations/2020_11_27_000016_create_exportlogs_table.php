<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportlogsTable extends Migration
{
    public function up()
    {
        Schema::create('exportlogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
