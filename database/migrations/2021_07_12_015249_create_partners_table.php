<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("partners", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("link");
            $table->string("image");
            $table->boolean("in_footer")->default(true);
            $table->boolean("show_anywhere")->default(false);
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
        Schema::dropIfExists("partners");
    }
}
