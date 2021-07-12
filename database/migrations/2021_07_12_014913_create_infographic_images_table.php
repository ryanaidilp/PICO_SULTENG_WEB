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
        Schema::create("infographic_images", function (Blueprint $table) {
            $table->id();
            $table->foreignId("infographic_id")->constrained("infographics");
            $table->integer("queue");
            $table->string("image_url");
            $table->unique(["infographic_id", "queue"]);
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
        Schema::dropIfExists("infographic_images");
    }
}
