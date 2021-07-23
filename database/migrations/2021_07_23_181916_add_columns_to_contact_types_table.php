<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToContactTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("contact_types", function (Blueprint $table) {
            $table->string("prefix")->after("name");
            $table->string("icon")->after("prefix");
            $table->string("bg_color")->after("icon");
            $table->string("label")->after("bg_color");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("contact_types", function (Blueprint $table) {
            $table->dropColumn(["prefix", "icon", "bg_color", "label"]);
        });
    }
}
