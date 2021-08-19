<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('village_cases', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('day')->constrained('national_cases');
            $table->bigInteger('village_id');
            $table->integer('positive');
            $table->integer('recovered');
            $table->integer('deceased');
            $table->double('person_under_observation')->nullable(); //ODP
            $table->double('person_under_supervision')->nullable(); //PDP
            $table->integer('finished_person_under_observation')->nullable();
            $table->integer('finished_person_under_supervision')->nullable();
            $table->integer('cumulative_positive');
            $table->integer('cumulative_recovered');
            $table->integer('cumulative_deceased');
            $table->double('cumulative_person_under_observation')->nullable();
            $table->double('cumulative_person_under_supervision')->nullable();
            $table->integer('cumulative_finished_person_under_observation')->nullable();
            $table->integer('cumulative_finished_person_under_supervision')->nullable();
            $table->double('rt')->nullable();
            $table->double('rt_upper')->nullable();
            $table->double('rt_lower')->nullable();
            $table->foreign('village_id')->references('id')->on('villages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('village_cases');
    }
}
