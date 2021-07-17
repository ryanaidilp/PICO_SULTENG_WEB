<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinceVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("province_vaccines", function (Blueprint $table) {
            $table->id();
            $table->foreignId("day")->constrained("national_vaccines", "id");
            $table->integer("province_id");
            $table->date("date");
            $table->integer("total_vaccine_target");
            $table->integer("total_vaccine_received");
            $table->integer("health_worker_vaccination_target");
            $table->integer("health_worker_first_vaccination_received");
            $table->integer("health_worker_second_vaccination_received");
            $table->integer("elderly_vaccination_target");
            $table->integer("elderly_first_vaccination_received");
            $table->integer("elderly_second_vaccination_received");
            $table->integer("public_officer_vaccination_target");
            $table->integer("public_officer_first_vaccination_received");
            $table->integer("public_officer_second_vaccination_received");
            $table->timestamps();
            $table->foreign("province_id")->references("id")->on("provinces");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("province_vaccines");
    }
}
