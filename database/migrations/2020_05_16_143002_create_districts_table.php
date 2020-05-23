<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('positive');
            $table->integer('negative');
            $table->integer('recovered');
            $table->integer('deceased');
            $table->integer('finished_ODP');
            $table->integer('new_ODP');
            $table->integer('ODP');
            $table->integer('finished_PDP');
            $table->integer('new_PDP');
            $table->integer('PDP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
