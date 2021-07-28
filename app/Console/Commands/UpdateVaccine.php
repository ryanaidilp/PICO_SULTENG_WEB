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
    protected $signature = "vaccine:update";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Update national vaccine data";

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
        $data = Http::get("https://data.covid19.go.id/public/api/pemeriksaan-vaksinasi.json");
        $data = $data["vaksinasi"]["penambahan"];
        $date = Carbon::parse($data["tanggal"]);
        if ($date->isAfter($vaccine->date)) {
            NationalVaccine::create([
                "day" => $vaccine->day + 1,
                "date" => Carbon::parse($data["created"]),
                "total_vaccination_target" => $vaccine->total_vaccination_target,
                "first_vaccination_received" => $data["jumlah_vaksinasi_1"],
                "second_vaccination_received" => $data["jumlah_vaksinasi_2"],
                "health_worker_vaccination_target" => $vaccine->health_worker_vaccination_target,
                "health_worker_first_vaccination_received" => $vaccine->health_worker_first_vaccination_received,
                "health_worker_second_vaccination_received" => $vaccine->health_worker_second_vaccination_received,
                "elderly_vaccination_target" => $vaccine->elderly_vaccination_target,
                "elderly_first_vaccination_received" => $vaccine->elderly_first_vaccination_received,
                "elderly_second_vaccination_received" => $vaccine->elderly_second_vaccination_received,
                "public_officer_vaccination_target" => $vaccine->public_officer_vaccination_target,
                "public_officer_first_vaccination_received" => $vaccine->public_officer_first_vaccination_received,
                "public_officer_second_vaccination_received" => $vaccine->public_officer_second_vaccination_received,

            ]);
            $this->info("Berhasil memperbarui data vaksin");
        } else {
            Log::error("Gagal memperbarui data vaksin!");
            $this->error("Gagal memperbarui data vaksin!");
        }
        return 0;
    }
}
