<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\NationalCase;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class UpdateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "covid:update";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Update covid data";

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
        $response = Http::get("https://data.covid19.go.id/public/api/update.json");
        if ($response->status() == 200) {
            $response = json_decode($response->body());
            $response = $response->update;
            $newCase = $response->penambahan;
            $latest = NationalCase::latest()->first();
            $date = Carbon::parse($newCase->created);
            $data = NationalCase::whereDate("date", $date)->get()->first();
            if ($data) {
                $this->error("Data already exists!");
                return;
            }
            if (!$date->isToday()) {
                Log::notice("Data tidak diperbarui!");
                return;
            }
            NationalCase::create([
                "day" => $latest->day + 1,
                "date" => $date,
                "positive" => $newCase->jumlah_positif,
                "recovered" => $newCase->jumlah_sembuh,
                "deceased" => $newCase->jumlah_meninggal,
            ]);
            $this->info("Successfully updated data");
        } else {
            $this->error("Failed create connection to the server");
        }
        return 0;
    }
}
