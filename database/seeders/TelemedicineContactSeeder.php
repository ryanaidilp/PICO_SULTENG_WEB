<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class TelemedicineContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/telemedicine_contacts.csv'));
        $data = \array_map('str_getcsv', $file);
        $keys = $data[0];
        \array_shift($data);
        foreach ($data as $row) {
            $row = array_combine($keys, $row);
            Contact::create($row);
        }
    }
}
