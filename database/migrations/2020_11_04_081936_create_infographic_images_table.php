<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfographicImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infographic_images', function (Blueprint $table) {
            $table->integer('id');
            $table->foreignId('id_infographic')->references('id')->on('infographics');
            $table->string('link'); //Image link
            $table->timestamps();
            $table->primary(['id', 'id_infographic']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infographic_images');
    }
}
