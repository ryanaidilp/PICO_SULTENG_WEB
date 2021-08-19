<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/provinsi.csv'));
        $data = \array_map('str_getcsv', $file);
        unset($data[0]);
        foreach ($data as $item) {
            Province::create([
                'id' => $item[0],
                'name' => $item[1],
                'map_id' => $item[5],
            ]);
        }
    }
}
