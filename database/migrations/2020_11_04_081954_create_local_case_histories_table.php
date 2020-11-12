<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalCaseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     * This table used to record case histories in every districts
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('local_case_histories', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('day')->references('id')->on('stats');
            $table->foreignId('district_id')->references('no')->on('kabupaten');
            $table->integer('positive'); //New positive case
            $table->integer('negative'); //New negative case
            $table->integer('recovered'); //New recovered case
            $table->integer('death'); //New death case
            $table->integer('new_ODP'); //New person under observation case
            $table->integer('finished_ODP'); //New finished person under observation case
            $table->integer('new_PDP'); //New person under supervision case
            $table->integer('finished_PDP'); //New finished person under supervision case
            $table->primary(['district_id', 'day']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_case_histories');
    }
}
