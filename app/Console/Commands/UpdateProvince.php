<?php

namespace App\Console\Commands;

use App\Models\Province;
use Illuminate\Console\Command;
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
        $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        if ($response->successful()) {
            $arrayProvince = $response->json();
            foreach ($arrayProvince as $prov) {
                $province = $prov['attributes'];
                $positif = $province['Kasus_Posi'];
                $sembuh = $province['Kasus_Semb'];
                $meninggal = $province['Kasus_Meni'];
                Province::where('kode_provinsi', $province['Kode_Provi'])
                    ->update([
                        'positif' => $positif,
                        'sembuh' => $sembuh,
                        'meninggal' => $meninggal,
                    ]);
            }
            $this->info('Successfully updated all province data!');
        } else {
            $this->error('Failed to update province!');
        }
        return 0;
    }
}
