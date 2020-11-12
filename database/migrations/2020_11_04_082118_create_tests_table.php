<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Test name
            $table->string('date'); //Last update
            $table->integer('positive'); //Positive result from test
            $table->integer('negative'); //Negative result from test
            $table->integer('process'); //Sample/test on progress
            $table->integer('invalid'); //Sample/test invalid
            $table->integer('total'); //Total test
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
