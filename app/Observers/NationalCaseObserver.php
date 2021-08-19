<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\NationalCase;

class NationalCaseObserver
{
    /**
     * Handle the NationalCase "creating" event.
     *
     * @param  \App\Models\NationalCase  $case
     * @return void
     */
    public function creating(NationalCase $case): void
    {
        $latest = NationalCase::latest('day')->first();
        $case->cumulative_positive = $case->positive + $latest->cumulative_positive;
        $case->cumulative_deceased = $case->deceased + $latest->cumulative_deceased;
        $case->cumulative_recovered = $case->recovered + $latest->cumulative_recovered;
    }

    /**
     * Handle the NationalCase "created" event.
     *
     * @param  \App\Models\NationalCase  $case
     * @return void
     */
    public function created(NationalCase $case): void
    {
        $now = Carbon::parse($case->date)->translatedFormat('l, d F Y');
        $heading = "Update kasus COVID-19 di Indonesia. $now!";

        $positive_new = formatCase($case->positive);
        $recovered_new = formatCase($case->recovered);
        $deceased_new = formatCase($case->deceased);
        $under_treatment_new = formatCase($case->under_treatment);

        $positive_cumulative = number_format($case->cumulative_positive, 0, ',', '.');
        $recovered_cumulative = number_format($case->cumulative_recovered, 0, ',', '.');
        $deceased_cumulative = number_format($case->cumulative_deceased, 0, ',', '.');
        $under_treatment_cumulative = number_format($case->cumulative_under_treatment, 0, ',', '.');

        $content = "Kasus COVID-19 di Indonesia sampai $now :\n$positive_new Positif : $positive_cumulative Kasus\n$recovered_new Sembuh : $recovered_cumulative  Kasus\n$deceased_new Meninggal : $deceased_cumulative Kasus\n$under_treatment_new Dirawat : $under_treatment_cumulative Kasus";

        \sendNotification($content, $heading);
    }

    /**
     * Handle the NationalCase "updated" event.
     *
     * @param  \App\Models\NationalCase  $case
     * @return void
     */
    public function updated(NationalCase $case): void
    {
        //
    }

    /**
     * Handle the NationalCase "deleted" event.
     *
     * @param  \App\Models\NationalCase  $case
     * @return void
     */
    public function deleted(NationalCase $case): void
    {
        //
    }

    /**
     * Handle the NationalCase "restored" event.
     *
     * @param  \App\Models\NationalCase  $case
     * @return void
     */
    public function restored(NationalCase $case): void
    {
        //
    }

    /**
     * Handle the NationalCase "force deleted" event.
     *
     * @param  \App\Models\NationalCase  $case
     * @return void
     */
    public function forceDeleted(NationalCase $case): void
    {
        //
    }
}
