<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Regency;
use Illuminate\Database\Seeder;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/kabupaten.csv'));
        $data = array_map('str_getcsv', $file);
        unset($data[0]);
        foreach ($data as $item) {
            Regency::create([
                'id' => $item[0],
                'province_id' => $item[1],
                'name' => $item[2],
            ]);
        }
    }
}
