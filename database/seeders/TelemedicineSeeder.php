<?php

namespace Database\Seeders;

use App\Models\Telemedicine;
use Illuminate\Database\Seeder;

class TelemedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file(\database_path("csvs/telemedicines.csv"));
        $data = \array_map("str_getcsv", $file);
        $keys = $data[0];
        \array_shift($data);
        foreach ($data as $row) {
            $row = array_combine($keys, $row);
            Telemedicine::create($row);
        }
    }
}
