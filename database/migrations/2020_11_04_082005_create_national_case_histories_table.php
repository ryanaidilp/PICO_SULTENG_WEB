<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalCaseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_case_histories', function (Blueprint $table) {
            $table->integer('day');
            $table->dateTime('date');
            $table->integer('cumulative_positive');
            $table->integer('cumulative_recovered');
            $table->integer('cumulative_deceased');
            $table->integer('cumulative_under_treatment');
            $table->integer('daily_positive_case');
            $table->integer('daily_recovered_case');
            $table->integer('daily_deceased_case');
            $table->integer('daily_under_treatment_case');
            $table->timestamps();
            $table->primary('day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('national_case_histories');
    }
}
