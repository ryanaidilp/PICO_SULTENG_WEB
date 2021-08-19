<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelemedicineSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('telemedicine_schedules', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('telemedicine_id')->constrained('telemedicines', 'id');
            $table->string('operational_day');
            $table->string('operational_time');
            $table->string('timezone');
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
        Schema::dropIfExists('telemedicine_schedules');
    }
}
