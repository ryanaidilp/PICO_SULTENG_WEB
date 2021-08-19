<?php



namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\NationalVaccine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class NationalVaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = Http::get('https://data.covid19.go.id/public/api/pemeriksaan-vaksinasi.json');
        $data = $data['vaksinasi']['harian'];
        for ($i = 0; $i < count($data); $i++) {
            NationalVaccine::create([
                'day' => $i + 1,
                'date' => Carbon::parse($data[$i]['key_as_string']),
                'total_vaccination_target' => 208265720,
                'first_vaccination_received' => $data[$i]['jumlah_vaksinasi_1']['value'],
                'second_vaccination_received' => $data[$i]['jumlah_vaksinasi_2']['value'],
                'cumulative_first_vaccination_received' => $data[$i]['jumlah_jumlah_vaksinasi_1_kum']['value'],
                'cumulative_second_vaccination_received' => $data[$i]['jumlah_jumlah_vaksinasi_2_kum']['value'],
                'health_worker_vaccination_target' => 1468764,
                'elderly_vaccination_target' => 21553118,
                'public_officer_vaccination_target' => 17327167,

            ]);
        }
    }
}
