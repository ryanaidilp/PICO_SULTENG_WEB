<?php



namespace Database\Seeders;

use App\Models\TestType;
use Illuminate\Database\Seeder;

class TestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'pcr',
                'name' => 'Polymerase Chain Reaction',
                'sample' => 'Spesimen saluran pernapasan (swab hidung, tenggorokan, dahak, dsb), tinja',
                'duration' => 'Tergantung banyak antrian sampel',
                'is_recommended' => true,
            ],
            [
                'key' => 'rdt',
                'name' => 'Rapid Diagnostic Test',
                'sample' => 'Tergantung tes (Antibodi atau Antigen)',
                'duration' => 'Tergantung tes (Antibodi atau Antigen)',
            ],
            [
                'key' => 'tcm',
                'name' => 'Tes Cepat Molekuler',
                'sample' => 'Swab pangkal hidung dan tenggorokan',
                'duration' => 'minimal 45 - 60 Menit',
            ],
            [
                'key' => 'rdt_ab',
                'name' => 'Rapid Diagnostic Test - Antibodi',
                'sample' => 'Darah dari ujung jari atau lengan',
                'duration' => 'minimal 10 - 15 Menit',
            ],
            [
                'key' => 'rdt_ag',
                'name' => 'Rapid Diagnostic Test - Antigen',
                'sample' => 'Swab pangkal hidung dan tenggorokan',
                'duration' => 'maksimal 60 - 90 Menit',
            ],
        ];

        foreach ($data as $item) {
            TestType::create($item);
        }
    }
}
