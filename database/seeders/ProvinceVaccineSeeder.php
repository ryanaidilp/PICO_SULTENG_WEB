<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ProvinceVaccine;
use Illuminate\Database\Seeder;

class ProvinceVaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/province_vaccines.csv'));
        $data = \array_map('str_getcsv', $file);
        $keys = $data[0];
        unset($data[0]);
        foreach ($data as $row) {
            ProvinceVaccine::create(array_combine($keys, $row));
        }
    }
}
