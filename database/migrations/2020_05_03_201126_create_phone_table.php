<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('phone', function (Blueprint $table) {
            $table->string('phone')->primary();
            $table->unsignedBigInteger('id_posko');
            $table->foreign('id_posko')->references('id')->on('posko');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('phone');
    }
}
