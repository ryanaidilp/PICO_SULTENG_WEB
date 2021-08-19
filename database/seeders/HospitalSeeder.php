<?php



namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/rumah_sakit.csv'));
        $data = \array_map('str_getcsv', $file);
        $keys = $data[0];
        unset($data[0]);
        foreach ($data as $item) {
            Hospital::create(\array_combine($keys, $item));
        }
    }
}
