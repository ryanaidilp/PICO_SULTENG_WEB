<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToRegencyCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("regency_cases", function (Blueprint $table) {
            $table
                ->integer("finished_person_under_observation")
                ->after("person_under_observation")
                ->nullable();
            $table
                ->integer("finished_person_under_supervision")
                ->after("person_under_supervision")
                ->nullable();
            $table
                ->integer("cumulative_finished_person_under_observation")
                ->after("cumulative_person_under_observation")
                ->nullable();
            $table
                ->integer("cumulative_finished_person_under_supervision")
                ->after("cumulative_person_under_supervision")
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("regency_cases", function (Blueprint $table) {
            $table->dropColumn("finished_person_under_observation");
            $table->dropColumn("finished_person_under_supervision");
            $table->dropColumn("cumulative_finished_person_under_observation");
            $table->dropColumn("cumulative_finished_person_under_supervision");
        });
    }
}
