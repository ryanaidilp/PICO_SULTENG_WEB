<?php



namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/districts.csv'));
        $data = \array_map('str_getcsv', $file);
        $keys = $data[0];
        \array_shift($data);
        foreach ($data as $row) {
            $row = \array_combine($keys, $row);
            District::create($row);
        }
    }
}
