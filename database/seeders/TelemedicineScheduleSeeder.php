<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TelemedicineSchedule;

class TelemedicineScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file(\database_path("csvs/telemedicine_schedules.csv"));
        $data = \array_map("str_getcsv", $file);
        $keys = $data[0];
        \array_shift($data);
        foreach ($data as $row) {
            $row = array_combine($keys, $row);
            TelemedicineSchedule::create($row);
        }
    }
}
