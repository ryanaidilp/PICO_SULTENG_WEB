<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("donations", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("initiator");
            $table->string("url");
            $table->string("description");
            $table->string("image");
            $table->boolean("accept_noncash")->default(0);
            $table->string("delivery_address")->nullable();
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
        Schema::dropIfExists("donations");
    }
}
