<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/villages.csv'));
        $data = \array_map('str_getcsv', $file);
        $keys = $data[0];
        \array_shift($data);
        foreach ($data as $row) {
            $row = \array_combine($keys, $row);
            Village::create($row);
        }
    }
}
