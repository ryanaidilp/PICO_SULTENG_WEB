<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProvinceGenderCase;

class ProvinceGenderCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/genders.csv'));
        $data = \array_map('str_getcsv', $file);
        $keys = $data[0];
        \array_splice($keys, 1, 0, ['province_id']);
        \array_shift($data);

        for ($i = 1; $i <= 20; $i++) {
            ProvinceGenderCase::create(array_combine($keys, [
                $i, 72, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            ]));
        }

        foreach ($data as $row) {
            ProvinceGenderCase::create(array_combine($keys, [
                $i, 72, $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14],
                $row[15], $row[16], $row[17], $row[18], $row[19], $row[20], $row[21], $row[22], $row[23], $row[24], $row[25], $row[26], $row[27], $row[28],
            ]));
            $i++;
        }
    }
}
