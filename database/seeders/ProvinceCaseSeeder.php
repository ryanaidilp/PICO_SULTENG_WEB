<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Province;
use Illuminate\Support\Str;
use App\Models\ProvinceCase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $first_case_date = Carbon::parse('2020-03-02');
        $provinces = Province::all();

        foreach ($provinces as $province) {
            $province_name = Str::replace(' ', '_', Str::upper($province->name));
            $data = Http::get("https://data.covid19.go.id/public/api/prov_detail_{$province_name}.json");
            $first_case_province = $data['list_perkembangan'][0]['tanggal'];
            $first_case_province = (int) substr(Str::of($first_case_province), 0, -3);
            $first_case_province = Carbon::parse($first_case_province);
            $diff = $first_case_date->diffInDays($first_case_province);

            // $data = collect($data["list_perkembangan"]);
            // $data = $data->filter(function ($daily) use ($first_case_date) {
            //     $dateint = (int) substr(Str::of($daily["tanggal"]), 0, -3);
            //     $date = Carbon::parse($dateint);
            //     return $date->isYesterday();
            // })->all();

            // dd($data);
            if ($first_case_province->isBefore($first_case_date)) {
                $cases = $data['list_perkembangan'];
                for ($i = 1; $i < count($cases) - $diff; $i++) {
                    ProvinceCase::create([
                        'day' => $i,
                        'province_id' => $province->id,
                        'positive' => $cases[$i + $diff]['KASUS'],
                        'recovered' => $cases[$i + $diff]['SEMBUH'],
                        'deceased' => $cases[$i + $diff]['MENINGGAL'],
                        'cumulative_positive' => $cases[$i + $diff]['AKUMULASI_KASUS'],
                        'cumulative_recovered' => $cases[$i + $diff]['AKUMULASI_SEMBUH'],
                        'cumulative_deceased' => $cases[$i + $diff]['AKUMULASI_MENINGGAL'],
                    ]);
                }
            } else {
                for ($i = 1; $i <= $diff; $i++) {
                    ProvinceCase::create([
                        'day' => $i,
                        'province_id' => $province->id,
                        'positive' => 0,
                        'recovered' => 0,
                        'deceased' => 0,
                        'cumulative_positive' => 0,
                        'cumulative_recovered' => 0,
                        'cumulative_deceased' => 0,
                    ]);
                }

                foreach ($data['list_perkembangan'] as $daily) {
                    ProvinceCase::create([
                        'day' => $i,
                        'province_id' => $province->id,
                        'positive' => $daily['KASUS'],
                        'recovered' => $daily['SEMBUH'],
                        'deceased' => $daily['MENINGGAL'],
                        'cumulative_positive' => $daily['AKUMULASI_KASUS'],
                        'cumulative_recovered' => $daily['AKUMULASI_SEMBUH'],
                        'cumulative_deceased' => $daily['AKUMULASI_MENINGGAL'],
                    ]);
                    $i++;
                }
            }
        }
    }
}
