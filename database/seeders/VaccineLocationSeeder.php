<?php



namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\VaccineLocation;
use Illuminate\Database\Seeder;

class VaccineLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/vaccine_locations.csv'));
        $data = \array_map('str_getcsv', $file);
        $keys = $data[0];
        \array_shift($data);
        foreach ($data as $row) {
            $row[6] = empty($row[6]) ? null : $row[6];
            $row[7] = empty($row[7]) ? null : $row[7];
            $row[8] = empty($row[8]) ? null : $row[8];
            $row[9] = Carbon::parse($row[9]);
            $row = array_combine($keys, $row);
            VaccineLocation::create($row);
        }
    }
}
