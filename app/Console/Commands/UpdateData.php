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
        $now = now()->translatedFormat('d F Y');
        $heading = [
            'en' => 'Update kasus COVID-19 di Indonesia, ' . $now,
        ];

        $positive_new =  formatCase($data->penambahan->jumlah_positif);
        $recovered_new =  formatCase($data->penambahan->jumlah_sembuh);
        $deceased_new = formatCase($data->penambahan->jumlah_meninggal);
        $under_treatment_new =  formatCase($data->penambahan->jumlah_dirawat);

        $positive_cumulative = number_format($data->total->jumlah_positif, 0, ',', '.');
        $recovered_cumulative = number_format($data->total->jumlah_sembuh, 0, ',', '.');
        $deceased_cumulative = number_format($data->total->jumlah_meninggal, 0, ',', '.');;
        $under_treatment_cumulative = number_format($data->total->jumlah_dirawat, 0, ',', '.');;

        $content = [
            'en' => "Kasus COVID-19 di Indonesia sampai $now : \n
            $positive_new Positif : $positive_cumulative Kasus\n
            $recovered_new Sembuh : $recovered_cumulative  Kasus\n
            $deceased_new Meninggal : $deceased_cumulative Kasus\n
            $under_treatment_new Dirawat : $under_treatment_cumulative Kasus"
        ];

        $fields = [
            'app_id' => env('ONESIGNAL_APP_ID'),
            'included_segments' => ['All'],
            'contents' => $content,
            'headings' => $heading,
            'url' => 'https://banuacoders.com/corona/data'
        ];
        Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . env('ONESIGNAL_API_KEY')
        ])->retry(3, 1000)->post(env('ONESIGNAL_API_URL'), $fields);
    }
}
