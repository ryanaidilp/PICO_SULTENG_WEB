<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     * create table for \App\Models\District
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->bigIncrements('no');
            $table->string('kabupaten'); //District Name
            $table->integer('ODP'); //Person under observation
            $table->integer('PDP'); //Person under supervision
            $table->integer('positif'); //positive case
            $table->integer('negatif'); //negative case
            $table->integer('sembuh'); //recovered case
            $table->integer('meninggal'); //deceased case
            $table->integer('Selesai_pengawasan'); //finished supervision
            $table->integer('Selesai_pemantauan'); //finished observation
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
        Schema::dropIfExists('kabupaten');
    }
}
