<?php



namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
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
                'id' => 1,
                'link' => 'https://detexi.id',
                'image' => 'detexi.png',
                'name' => 'Detexi',
            ],
            [
                'id' => 2,
                'link' => 'https://kawalcovid19.id',
                'image' => 'kawalcovid.png',
                'name' => 'Kawal Covid',
            ],
            [
                'id' => 3,
                'link' => 'https://kawalcorona.com',
                'image' => 'ehi.png',
                'name' => 'Kawal Corona',
            ],
            [
                'id' => 4,
                'link' => 'https://covid19.go.id/peta-sebaran',
                'image' => 'inacovid.png',
                'name' => 'Gugus Tugas COVID-19 Indonesia',
            ],
            [
                'id' => 5,
                'link' => 'https://chartjs.org',
                'image' => 'charts.png',
                'name' => 'Chart Js',
            ],
            [
                'id' => 6,
                'link' => 'https://vuejs.org',
                'image' => 'vue.svg',
                'name' => 'Vue JS',
            ],
            [
                'id' => 7,
                'link' => 'https://laravel.com',
                'image' => 'laravel.jpeg',
                'name' => 'Laravel',
            ],
            [
                'id' => 8,
                'link' => 'https://anychart.com',
                'image' => 'anychart.png',
                'name' => 'Anychart',
            ],
            [
                'id' => 9,
                'link' => 'https://dinkes.sultengprov.go.id',
                'image' => 'dinkes.png',
                'name' => 'Dinas Kesehatan Provinsi Sulteng',
            ],
            [
                'id' => 10,
                'link' => 'https://sultenglawancovid.com',
                'image' => 'sultenglawancovid.png',
                'name' => 'Sulteng Lawan COVID',
            ],
            [
                'id' => 11,
                'link' => 'https://banuacoders.com',
                'image' => 'banuacoders.png',
                'name' => 'Banua Coders',
            ],
            [
                'id' => 12,
                'link' => 'https://pikobar.jabarprov.go.id',
                'image' => 'pikobar.png',
                'name' => 'PIKOBAR Jawa Barat',
            ],
        ];
        foreach ($data as $item) {
            Partner::create($item);
        }
    }
}
