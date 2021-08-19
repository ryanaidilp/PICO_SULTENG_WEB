<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\NationalCase;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class NationalCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/national_case_histories.csv'));
        $data = array_map('str_getcsv', $file);
        unset($data[0]);
        foreach ($data as $item) {
            NationalCase::create([
                'day' => $item[0],
                'date' => Carbon::parse($item[1]),
                'positive' => $item[6],
                'recovered' => $item[7],
                'deceased' => $item[8],
                'cumulative_positive' => $item[2],
                'cumulative_recovered' => $item[3],
                'cumulative_deceased' => $item[4],
            ]);
        }
    }
}
