<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinceTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('province_tests', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('test_type_id')->constrained('test_types');
            $table->foreignId('day')->constrained('national_cases', 'id');
            $table->integer('province_id');
            $table->integer('process');
            $table->integer('invalid');
            $table->integer('positive');
            $table->integer('negative');
            $table->foreign('province_id')->references('id')->on('provinces');
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
        Schema::dropIfExists('province_tests');
    }
}
