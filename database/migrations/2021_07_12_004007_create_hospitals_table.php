<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("hospitals", function (Blueprint $table) {
            $table->id();
            $table->integer("regency_id");
            $table->string("name");
            $table->string("hospital_code")->nullable();
            $table->text("address");
            $table->double("latitude");
            $table->double("longitude");
            $table->foreign("regency_id")->references("id")->on("regencies");
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
        Schema::dropIfExists("hospitals");
    }
}
