<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ProvinceTest;
use Illuminate\Database\Seeder;

class ProvinceTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $first_test_date = Carbon::parse('2020-03-02');
        $file = file(\database_path('csvs/test_histories.csv'));
        $data = \array_map('str_getcsv', $file);
        unset($data[0]);
        $first_test_date_province = Carbon::parse($data[1][2]);
        $diff = $first_test_date->diffInDays($first_test_date_province);

        for ($i = 1; $i <= $diff; $i++) {
            $date_from = $first_test_date->addDays($i);

            ProvinceTest::create([
                'test_type_id' => ProvinceTest::PCR,
                'day' => $i,
                'process' => 0,
                'invalid' => 0,
                'positive' => 0,
                'negative' => 0,
                'date_from' => $date_from,
                'province_id' => 72,
            ]);
            ProvinceTest::create([
                'test_type_id' => ProvinceTest::RDT,
                'day' => $i,
                'process' => 0,
                'invalid' => 0,
                'positive' => 0,
                'negative' => 0,
                'date_from' => $date_from,
                'province_id' => 72,
            ]);
        }

        foreach ($data as $item) {
            ProvinceTest::create([
                'test_type_id' => ProvinceTest::PCR,
                'day' => $diff + $item[0],
                'process' => $item[3],
                'invalid' => $item[4],
                'positive' => $item[5],
                'negative' => $item[6],
                'date_from' => $item[2],
                'province_id' => 72,
            ]);
            ProvinceTest::create([
                'test_type_id' => ProvinceTest::RDT,
                'day' => $diff + $item[0],
                'process' => $item[8],
                'invalid' => $item[9],
                'positive' => $item[10],
                'negative' => $item[11],
                'date_from' => $item[7],
                'province_id' => 72,
            ]);
        }
    }
}
