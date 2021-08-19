<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\RegencyCase;
use Illuminate\Database\Seeder;

class RegencyCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/regency_cases.csv'));
        $data = array_map('str_getcsv', $file);
        $keys = $data[0];
        \array_shift($data);
        $regency_id = $data[0][1];

        for ($i = 1; $i <= 20; $i++) {
            RegencyCase::create(array_combine($keys, [
                $i, $regency_id, 0, 0, 0, 0, 0, 0,
            ]));
        }

        foreach ($data as $row) {
            RegencyCase::create(array_combine($keys, [
                $i, $regency_id, $row[2], $row[3], $row[4], $row[5], $row[6], $row[7],
            ]));
            $i++;
        }
    }
}
