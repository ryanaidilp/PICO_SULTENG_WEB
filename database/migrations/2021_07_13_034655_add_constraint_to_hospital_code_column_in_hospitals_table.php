<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintToHospitalCodeColumnInHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("hospitals", function (Blueprint $table) {
            $table->unique("hospital_code");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("hospitals", function (Blueprint $table) {
            $table->dropUnique("hospitals_hospital_code_unique");
        });
    }
}
