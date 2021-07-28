<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("regencies", function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->integer("province_id");
            $table->string("name");
            $table->foreign("province_id")->references("id")->on("provinces");
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
        Schema::dropIfExists("regencies");
    }
}
