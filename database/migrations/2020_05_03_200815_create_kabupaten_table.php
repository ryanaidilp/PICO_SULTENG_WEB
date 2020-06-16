<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->bigIncrements('no');
            $table->string('kabupaten', 50);
            $table->integer('ODP');
            $table->integer('PDP');
            $table->integer('positif');
            $table->integer('negatif');
            $table->integer('sembuh');
            $table->integer('meninggal');
            $table->integer('selesai_pengawasan');
            $table->integer('selesai_pemantauan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('kabupaten');
    }
}
