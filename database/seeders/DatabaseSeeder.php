<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TestTypeSeeder::class,
            ContactTypeSeeder::class,
            HospitalBedTypeSeeder::class,
            PartnerSeeder::class,
            NationalCaseSeeder::class,
            ProvinceSeeder::class,
            RegencySeeder::class,
            ProvinceCaseSeeder::class,
            ProvinceTestSeeder::class,
            RegencyCaseSeeder::class,
            HospitalSeeder::class,
            TaskForceSeeder::class,
            InfographicSeeder::class,
            InfographicImageSeeder::class,
            ProvinceGenderCaseSeeder::class
        ]);
    }
}
