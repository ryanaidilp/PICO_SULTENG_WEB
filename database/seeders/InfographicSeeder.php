<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Infographic;
use Illuminate\Database\Seeder;

class InfographicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = file(\database_path('csvs/infographics.csv'));
        $data = \array_map('str_getcsv', $file);
        unset($data[0]);
        foreach ($data as $row) {
            Infographic::create([
                'title' => $row[1],
                'source' => $row[2],
            ]);
        }
    }
}
