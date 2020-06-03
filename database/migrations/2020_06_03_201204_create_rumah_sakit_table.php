<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRumahSakitTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rumah_sakit', function (Blueprint $table) {
            $table->bigIncrements('no');
            $table->string('nama', 23);
            $table->text('alamat');
            $table->string('telepon', 20);
            $table->string('email', 50);
            $table->string('longitude', 20);
            $table->string('latitude', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('rumah_sakit');
    }
}
