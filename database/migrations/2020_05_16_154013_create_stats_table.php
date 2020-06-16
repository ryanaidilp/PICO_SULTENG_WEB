<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('day');
            $table->string('date');
            $table->integer('positive');
            $table->integer('recovered');
            $table->integer('death');
            $table->integer('negative')->default(0);
            $table->integer('new_ODP')->default(0);
            $table->integer('new_PDP')->default(0);
            $table->integer('finished_ODP')->default(0);
            $table->integer('finished_PDP')->default(0);
            $table->double('Rt')->default(0);
            $table->double('Rt_upper')->default(0);
            $table->double('Rt_lower')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
}
