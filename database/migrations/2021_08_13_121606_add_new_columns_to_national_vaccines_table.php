<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsToNationalVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('national_vaccines', function (Blueprint $table): void {
            $table->integer('public_vaccination_target')
                ->default(0)
                ->after('cumulative_public_officer_second_vaccination_received');
            $table->integer('public_first_vaccination_received')
                ->default(0)
                ->after('public_vaccination_target');
            $table->integer('public_second_vaccination_received')
                ->default(0)
                ->after('public_first_vaccination_received');
            $table->integer('cumulative_public_first_vaccination_received')
                ->default(0)
                ->after('public_second_vaccination_received');
            $table->integer('cumulative_public_second_vaccination_received')
                ->default(0)
                ->after('cumulative_public_first_vaccination_received');
            $table->integer('teenager_vaccination_target')
                ->default(0)
                ->after('public_second_vaccination_received');
            $table->integer('teenager_first_vaccination_received')
                ->default(0)
                ->after('teenager_vaccination_target');
            $table->integer('teenager_second_vaccination_received')
                ->default(0)
                ->after('teenager_first_vaccination_received');
            $table->integer('cumulative_teenager_first_vaccination_received')
                ->default(0)
                ->after('teenager_second_vaccination_received');
            $table->integer('cumulative_teenager_second_vaccination_received')
                ->default(0)
                ->after('cumulative_teenager_first_vaccination_received');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('national_vaccines', function (Blueprint $table): void {
            $table->dropColumn('public_vaccination_target');
            $table->dropColumn('public_first_vaccination_received');
            $table->dropColumn('public_second_vaccination_received');
            $table->dropColumn('cumulative_public_first_vaccination_received');
            $table->dropColumn('cumulative_public_second_vaccination_received');
            $table->dropColumn('teenager_vaccination_target');
            $table->dropColumn('teenager_first_vaccination_received');
            $table->dropColumn('teenager_second_vaccination_received');
            $table->dropColumn('cumulative_teenager_first_vaccination_received');
            $table->dropColumn('cumulative_teenager_second_vaccination_received');
        });
    }
}
