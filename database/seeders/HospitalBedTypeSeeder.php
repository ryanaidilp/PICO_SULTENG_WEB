<?php

namespace Database\Seeders;

use App\Models\HospitalBedType;
use Illuminate\Database\Seeder;

class HospitalBedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "IGD Khusus Covid",
            "PICU Khusus Covid",
            "NICU Khusus Covid",
            "Isolasi Tanpa Tekanan Negatif",
            "Isolasi Tekanan Negatif",
            "ICU Tanpa Tekanan Negatif Tanpa Ventiltor",
            "ICU Tanpa Tekanan Negatif Dengan Ventilator",
            "ICU Tekanan Negatif tanpa Ventilator",
            "ICU Tekanan Negatif dengan Ventilator"
        ];

        foreach ($data as $item) {
            HospitalBedType::create([
                "name" => $item
            ]);
        }
    }
}
