<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalCaseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('local_case_histories', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('day');
            $table->foreign('day')->references('id')->on('stats');
            $table->integer('district_id');
            $table->foreign('district_id')->references('no')->on('kabupaten');
            $table->integer('positive');
            $table->integer('negative');
            $table->integer('recovered');
            $table->integer('death');
            $table->integer('new_ODP');
            $table->integer('finished_ODP');
            $table->integer('new_PDP');
            $table->integer('finished_PDP');
            $table->primary(['day', 'district_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('local_case_histories');
    }
}
