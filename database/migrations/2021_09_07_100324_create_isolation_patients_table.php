<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsolationPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('isolation_patients', function (Blueprint $table): void {
            $table->id();
            $table->string('sub_id');
            $table->string('name');
            $table->string('nik');
            $table->date('dob');
            $table->string('id_card');
            $table->string('needs');
            $table->string('address');
            $table->string('address_note');
            $table->string('rt');
            $table->string('rw');
            $table->decimal('latitude', 10, 8)->default(0);
            $table->decimal('longitude', 11, 8)->default(0);
            $table->string('phone');
            $table->string('alt_phone')->nullable();
            $table->string('test_type');
            $table->string('test_desc')->nullable();
            $table->string('test_result');
            $table->date('test_date');
            $table->date('confirmed_date');
            $table->integer('patient_count');
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
        Schema::dropIfExists('isolation_patients');
    }
}
