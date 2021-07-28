<?php

namespace Database\Seeders;

use App\Models\InfographicImage;
use Illuminate\Database\Seeder;

class InfographicImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file(\database_path("csvs/infographic_images.csv"));
        $data = \array_map("str_getcsv", $file);
        unset($data[0]);
        foreach ($data as $row) {
            InfographicImage::create([
                "infographic_id" => $row[2],
                "queue" => $row[1],
                "image_url" => $row[3]
            ]);
        }
    }
}
