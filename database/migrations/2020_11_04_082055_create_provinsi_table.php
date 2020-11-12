<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsi', function (Blueprint $table) {
            $table->integer('kode_provinsi')->primary(); //Province code
            $table->string('provinsi'); //Province name
            $table->integer('positif'); //Positive case
            $table->integer('meninggal'); //Deceased case
            $table->integer('sembuh'); //Recovered case
            $table->string('map_id'); //Map key matched GeoJson key to integrate in chart plugin like AnyChart Map
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
        Schema::dropIfExists('provinsi');
    }
}
