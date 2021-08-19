<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Province;
use Illuminate\Support\Str;
use App\Models\NationalCase;
use App\Models\ProvinceCase;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class UpdateProvince extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'covid:province';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all province data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $provinces = Province::all();
        $national_case = NationalCase::latest()->first();
        $provinces = Province::all();

        foreach ($provinces as $province) {
            $province_name = Str::replace(' ', '_', Str::upper($province->name));
            $data = Http::get("https://data.covid19.go.id/public/api/prov_detail_{$province_name}.json");
            $first_case_province = $data['list_perkembangan'][0]['tanggal'];
            $first_case_province = (int) mb_substr(Str::of($first_case_province), 0, -3);
            $first_case_province = Carbon::parse($first_case_province);

            $data = collect($data['list_perkembangan']);
            $data = $data->filter(function ($daily) {
                $dateint = (int) mb_substr(Str::of($daily['tanggal']), 0, -3);
                $date = Carbon::parse($dateint);

                return $date->isToday();
            })->values()->first();

            if ($data) {
                ProvinceCase::create([
                    'day' => $national_case->day,
                    'province_id' => $province->id,
                    'positive' => $data['KASUS'],
                    'recovered' => $data['SEMBUH'],
                    'deceased' => $data['MENINGGAL'],
                ]);
            } else {
                Log::error("Gagal memperbarui data covid $province_name");
            }
        }

        return 0;
    }
}
