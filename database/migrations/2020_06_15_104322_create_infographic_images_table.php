<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigInteger('id');
            $table->unsignedBigInteger('id_infographic');
            $table->foreign('id_infographic')->references('id')->on('infographics');
            $table->string('link');
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
