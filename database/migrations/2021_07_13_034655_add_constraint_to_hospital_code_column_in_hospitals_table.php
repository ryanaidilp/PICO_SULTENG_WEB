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
    public function up(): void
    {
        Schema::table('hospitals', function (Blueprint $table): void {
            $table->unique('hospital_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('hospitals', function (Blueprint $table): void {
            $table->dropUnique('hospitals_hospital_code_unique');
        });
    }
}
