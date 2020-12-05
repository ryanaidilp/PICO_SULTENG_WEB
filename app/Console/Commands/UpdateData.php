<?php

namespace App\Console\Commands;

use App\Models\NationalCaseHistory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'covid:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update covid data';

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
        $response = Http::get('https://data.covid19.go.id/public/api/update.json');
        if ($response->status() == 200) {
            $response = json_decode($response->body());
            $response = $response->update;
            $newCase = $response->penambahan;
            $cumulative = $response->total;
            $latest = NationalCaseHistory::latest()->first();
            NationalCaseHistory::create([
                'day' => $latest->day + 1,
                'date' => Carbon::parse($newCase->created),
                'cumulative_positive' => $cumulative->jumlah_positif,
                'cumulative_under_treatment' => $cumulative->jumlah_dirawat,
                'cumulative_recovered' => $cumulative->jumlah_sembuh,
                'cumulative_deceased' => $cumulative->jumlah_meninggal,
                'daily_positive_case' => $newCase->jumlah_positif,
                'daily_under_treatment_case' => $newCase->jumlah_dirawat,
                'daily_recovered_case' => $newCase->jumlah_sembuh,
                'daily_deceased_case' => $newCase->jumlah_meninggal,
            ]);
            $this->sendMessage($response);
            $this->info('Successfully updated data');
        } else {
            $this->error('Failed create connection to the server');
        }
        return 0;
    }

    private function sendMessage($data)
    {
        $heading = [
            'id' => 'Update kasus COVID-19 di Indonesia, ' . now()->translatedFormat('d F Y')
        ];
        $content = [
            'id' => "
            Kasus COVID-19 di Indonesia sampai " . now()->translatedFormat('d F Y') . " : \n"
                . formatCase($data->penambahan->jumlah_positif) . " Positif : " . formatCase($data->total->jumlah_positif) . ' Kasus\n'
                . formatCase($data->penambahan->jumlah_sembuh) . " Sembuh : " . formatCase($data->total->jumlah_sembuh) . ' Kasus\n'
                . formatCase($data->penambahan->jumlah_meninggal) . " Meninggal : " . formatCase($data->total->jumlah_meninggal) . ' Kasus\n'
                . formatCase($data->penambahan->jumlah_dirawat) . " Dirawat : " . formatCase($data->total->jumlah_dirawat) . ' Kasus\n'

        ];

        $fields = [
            'app_id' => env('ONESIGNAL_APP_ID'),
            'included_segments' => ['All'],
            'contents' => $content,
            'headings' => $heading,
            'url' => 'https://banuacoders.com/corona/data'
        ];
        Http::withHeaders([
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic ' . env('ONESIGNAL_API_KEY')
        ])->retry(3, 1000)->post(env('ONESIGNAL_API_URL'), $fields);
    }
}
