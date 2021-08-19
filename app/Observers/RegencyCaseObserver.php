<?php

namespace App\Observers;

use App\Models\RegencyCase;
use Illuminate\Support\Carbon;

class RegencyCaseObserver
{
    /**
     * Handle the RegencyCase "creating" event.
     *
     * @param  \App\Models\ProvinceCase  $case
     * @return void
     */
    public function creating(RegencyCase $case): void
    {
        $latest = RegencyCase::where('regency_id', $case->regency_id)
            ->latest('day')->first();
        $case->cumulative_positive = $case->positive + $latest->cumulative_positive;
        $case->cumulative_deceased = $case->deceased + $latest->cumulative_deceased;
        $case->cumulative_recovered = $case->recovered + $latest->cumulative_recovered;
        $case->cumulative_person_under_observation = ($case->person_under_observation ?? 0) + ($latest->cumulative_person_under_observation ?? 0);
        $case->cumulative_person_under_supervision = ($case->person_under_supervision ?? 0) + ($latest->cumulative_person_under_supervision ?? 0);
        $case->cumulative_finished_person_under_observation = ($case->finished_person_under_observation ?? 0) + ($latest->cumulative_finished_person_under_observation ?? 0);
        $case->cumulative_finished_person_under_supervision = ($case->finished_person_under_supervision ?? 0) + ($latest->cumulative_finished_person_under_supervision ?? 0);
    }

    /**
     * Handle the RegencyCase "created" event.
     *
     * @param  \App\Models\RegencyCase  $case
     * @return void
     */
    public function created(RegencyCase $case): void
    {
        $positive_new = formatCase($case->positive);
        $recovered_new = formatCase($case->recovered);
        $deceased_new = formatCase($case->deceased);
        $under_treatment_new = formatCase($case->under_treatment);

        $positive_cumulative = number_format($case->cumulative_positive, 0, ',', '.');
        $recovered_cumulative = number_format($case->cumulative_recovered, 0, ',', '.');
        $deceased_cumulative = number_format($case->cumulative_death, 0, ',', '.');
        $under_treatment_cumulative = number_format($case->cumulative_under_treatment, 0, ',', '.');

        $now = Carbon::parse($case->date)->translatedFormat('l, d F Y');
        $header = "Update COVID-19 di {$case->regency->name}.  $now!";
        $content = "Kasus COVID-19 di {$case->regency->name} sampai $now :\n$positive_new Positif : $positive_cumulative Kasus\n$recovered_new Sembuh : $recovered_cumulative Kasus\n$deceased_new Meninggal : $deceased_cumulative Kasus\n$under_treatment_new Dirawat : $under_treatment_cumulative Kasus";

        sendNotification($content, $header);
    }

    /**
     * Handle the RegencyCase "updated" event.
     *
     * @param  \App\Models\RegencyCase  $case
     * @return void
     */
    public function updated(RegencyCase $case): void
    {
        //
    }

    /**
     * Handle the RegencyCase "deleted" event.
     *
     * @param  \App\Models\RegencyCase  $case
     * @return void
     */
    public function deleted(RegencyCase $case): void
    {
        //
    }

    /**
     * Handle the RegencyCase "restored" event.
     *
     * @param  \App\Models\RegencyCase  $case
     * @return void
     */
    public function restored(RegencyCase $case): void
    {
        //
    }

    /**
     * Handle the RegencyCase "force deleted" event.
     *
     * @param  \App\Models\RegencyCase  $case
     * @return void
     */
    public function forceDeleted(RegencyCase $case): void
    {
        //
    }
}
