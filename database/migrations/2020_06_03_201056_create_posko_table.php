<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoskoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posko', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 60);
            $table->integer('kode_kabupaten');
            $table->foreign('kode_kabupaten')->references('no')->on('kabupaten');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('posko');
    }
}
