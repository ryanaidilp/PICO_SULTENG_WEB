<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Create stats table for
     * App\Models\Statistic 
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->integer('day');
            $table->dateTime('date');
            $table->integer('positive');
            $table->integer('recovered');
            $table->integer('death');
            $table->integer('negative');
            $table->integer('new_ODP'); //New case of person under observation
            $table->integer('new_PDP'); //New case of person under supervision
            $table->integer('finished_ODP'); //New finished case of person under observation
            $table->integer('finished_PDP'); //New finished case of person under supervision
            $table->double('Rt'); //Effective reproduction number (Rt) on given day
            $table->double('Rt_upper'); //Effective reproduction number (Rt) on given day
            $table->double('Rt_lower'); //Effective reproduction number (Rt) on given day
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
        Schema::dropIfExists('stats');
    }
}
