<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahSakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * create table for \App\Models\Hospital
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_sakit', function (Blueprint $table) {
            $table->bigIncrements('no')->primary();
            $table->string('namea'); //Name
            $table->text('alamat'); //Address
            $table->string('telepon'); //Telephone number
            $table->string('email'); //Email
            $table->double('latitude'); //Hospital's latitude
            $table->double('longitude'); //Hospital's longitude
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
        Schema::dropIfExists('rumah_sakit');
    }
}
