<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\NationalVaccine;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class UpdateVaccine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaccine:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update national vaccine data';

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
        $vaccine = NationalVaccine::latest()->first();
        $data = Http::get('https://cekdiri.id/vaksinasi');
        $last_update = Carbon::parse($data['last_updated']);
        $data = \collect($data['monitoring'])->last();
        $date = Carbon::parse($data['date']);

        if ($date->isAfter($vaccine->date)) {
            NationalVaccine::create([
                'day' => $vaccine->day + 1,
                'date' => $last_update,
                'total_vaccination_target' => $data['total_sasaran_vaksinasi'],
                'cumulative_first_vaccination_received' => $data['vaksinasi1'],
                'cumulative_second_vaccination_received' => $data['vaksinasi2'],
                'health_worker_vaccination_target' => $data['sasaran_vaksinasi_sdmk'],
                'cumulative_health_worker_first_vaccination_received' => $data['tahapan_vaksinasi']['sdm_kesehatan']['total_vaksinasi1'],
                'cumulative_health_worker_second_vaccination_received' => $data['tahapan_vaksinasi']['sdm_kesehatan']['total_vaksinasi2'],
                'elderly_vaccination_target' => $data['sasaran_vaksinasi_lansia'],
                'cumulative_elderly_first_vaccination_received' => $data['tahapan_vaksinasi']['lansia']['total_vaksinasi1'],
                'cumulative_elderly_second_vaccination_received' => $data['tahapan_vaksinasi']['lansia']['total_vaksinasi2'],
                'public_officer_vaccination_target' => $data['sasaran_vaksinasi_petugas_publik'],
                'cumulative_public_officer_first_vaccination_received' => $data['tahapan_vaksinasi']['petugas_publik']['total_vaksinasi1'],
                'cumulative_public_officer_second_vaccination_received' => $data['tahapan_vaksinasi']['petugas_publik']['total_vaksinasi2'],
                'public_vaccination_target' => $data['sasaran_vaksinasi_masyarakat_umum'],
                'cumulative_public_first_vaccination_received' => $data['tahapan_vaksinasi']['masyarakat_umum']['total_vaksinasi1'],
                'cumulative_public_second_vaccination_received' => $data['tahapan_vaksinasi']['masyarakat_umum']['total_vaksinasi2'],
                'teenager_vaccination_target' => $data['sasaran_vaksinasi_kelompok_1217'],
                'cumulative_teenager_first_vaccination_received' => $data['tahapan_vaksinasi']['kelompok_usia_12_17']['total_vaksinasi1'],
                'cumulative_teenager_second_vaccination_received' => $data['tahapan_vaksinasi']['kelompok_usia_12_17']['total_vaksinasi2'],
            ]);
            $this->info('Berhasil memperbarui data vaksin');
            Log::info('Berhasil menambahkan data vaksin!');
        } elseif ($date->isSameAs($vaccine->date)) {
            $yesterday = NationalVaccine::where('day', $vaccine->day - 1)->first();
            $attributes = [
                'date' => $last_update,
                'total_vaccination_target' => $data['total_sasaran_vaksinasi'],
                'first_vaccination_received' => $data['vaksinasi1'] - $yesterday->cumulative_first_vaccination_received,
                'second_vaccination_received' => $data['vaksinasi2'] - $yesterday->cumulative_second_vaccination_received,
                'health_worker_vaccination_target' => $data['sasaran_vaksinasi_sdmk'],
                'health_worker_first_vaccination_received' => $data['tahapan_vaksinasi']['sdm_kesehatan']['total_vaksinasi1'] - $yesterday->cumulative_health_worker_first_vaccination_received,
                'health_worker_second_vaccination_received' => $data['tahapan_vaksinasi']['sdm_kesehatan']['total_vaksinasi2'] - $yesterday->cumulative_health_worker_second_vaccination_received,
                'elderly_vaccination_target' => $data['sasaran_vaksinasi_lansia'],
                'elderly_first_vaccination_received' => $data['tahapan_vaksinasi']['lansia']['total_vaksinasi1'] - $yesterday->cumulative_elderly_first_vaccination_received,
                'elderly_second_vaccination_received' => $data['tahapan_vaksinasi']['lansia']['total_vaksinasi2'] - $yesterday->cumulative_elderly_second_vaccination_received,
                'public_officer_vaccination_target' => $data['sasaran_vaksinasi_petugas_publik'],
                'public_officer_first_vaccination_received' => $data['tahapan_vaksinasi']['petugas_publik']['total_vaksinasi1'] - $yesterday->cumulative_public_officer_first_vaccination_received,
                'public_officer_second_vaccination_received' => $data['tahapan_vaksinasi']['petugas_publik']['total_vaksinasi2'] - $yesterday->cumulative_public_officer_second_vaccination_received,
                'public_vaccination_target' => $data['sasaran_vaksinasi_masyarakat_umum'],
                'public_first_vaccination_received' => $data['tahapan_vaksinasi']['masyarakat_umum']['total_vaksinasi1'] - $vaccine->cumulative_public_first_vaccination_received,
                'public_second_vaccination_received' => $data['tahapan_vaksinasi']['masyarakat_umum']['total_vaksinasi2'] - $vaccine->cumulative_public_second_vaccination_received,
                'teenager_vaccination_target' => $data['sasaran_vaksinasi_kelompok_1217'],
                'teenager_first_vaccination_received' => $data['tahapan_vaksinasi']['kelompok_usia_12_17']['total_vaksinasi1'] - $vaccine->cumulative_teenager_first_vaccination_received,
                'teenager_second_vaccination_received' => $data['tahapan_vaksinasi']['kelompok_usia_12_17']['total_vaksinasi2'] - $vaccine->cumulative_teenager_second_vaccination_received,
                'cumulative_first_vaccination_received' => $data['vaksinasi1'],
                'cumulative_second_vaccination_received' => $data['vaksinasi2'],
                'cumulative_health_worker_first_vaccination_received' => $data['tahapan_vaksinasi']['sdm_kesehatan']['total_vaksinasi1'],
                'cumulative_health_worker_second_vaccination_received' => $data['tahapan_vaksinasi']['sdm_kesehatan']['total_vaksinasi2'],
                'cumulative_elderly_first_vaccination_received' => $data['tahapan_vaksinasi']['lansia']['total_vaksinasi1'],
                'cumulative_elderly_second_vaccination_received' => $data['tahapan_vaksinasi']['lansia']['total_vaksinasi2'],
                'cumulative_public_officer_first_vaccination_received' => $data['tahapan_vaksinasi']['petugas_publik']['total_vaksinasi1'],
                'cumulative_public_officer_second_vaccination_received' => $data['tahapan_vaksinasi']['petugas_publik']['total_vaksinasi2'],
                'cumulative_public_first_vaccination_received' => $data['tahapan_vaksinasi']['masyarakat_umum']['total_vaksinasi1'],
                'cumulative_public_second_vaccination_received' => $data['tahapan_vaksinasi']['masyarakat_umum']['total_vaksinasi2'],
                'cumulative_teenager_first_vaccination_received' => $data['tahapan_vaksinasi']['kelompok_usia_12_17']['total_vaksinasi1'],
                'cumulative_teenager_second_vaccination_received' => $data['tahapan_vaksinasi']['kelompok_usia_12_17']['total_vaksinasi2'],
            ];
            $vaccine->update($attributes);
            Log::info("Memperbarui data vaksin tanggal $last_update!");
        } else {
            Log::error('Gagal memperbarui data vaksin!');
            $this->error('Gagal memperbarui data vaksin!');
        }

        return 0;
    }
}
