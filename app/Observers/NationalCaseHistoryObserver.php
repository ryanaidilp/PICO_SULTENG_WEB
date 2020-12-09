<?php

namespace App\Observers;

use App\Models\NationalCaseHistory;

class NationalCaseHistoryObserver
{
    /**
     * Handle the NationalCaseHistory "created" event.
     *
     * @param  \App\Models\NationalCaseHistory  $nationalCaseHistory
     * @return void
     */
    public function created(NationalCaseHistory $nationalCaseHistory)
    {
        $now = now()->translatedFormat('l, d F Y');
        $heading = "Update kasus COVID-19 di Indonesia. $now!";

        $positive_new =  formatCase($nationalCaseHistory->daily_positive_case);
        $recovered_new =  formatCase($nationalCaseHistory->daily_recovered_case);
        $deceased_new = formatCase($nationalCaseHistory->penambahan->daily_deceased_case);
        $under_treatment_new =  formatCase($nationalCaseHistory->daily_under_treatment_case);

        $positive_cumulative = number_format($nationalCaseHistory->cumulative_positive, 0, ',', '.');
        $recovered_cumulative = number_format($nationalCaseHistory->cumulative_recovered, 0, ',', '.');
        $deceased_cumulative = number_format($nationalCaseHistory->total->cumulative_deceased, 0, ',', '.');
        $under_treatment_cumulative = number_format($nationalCaseHistory->cumulative_under_treatment, 0, ',', '.');

        $content =  "Kasus COVID-19 di Indonesia sampai $now :
        \n$positive_new Positif : $positive_cumulative Kasus
        \n$recovered_new Sembuh : $recovered_cumulative  Kasus
        \n$deceased_new Meninggal : $deceased_cumulative Kasus
        \n$under_treatment_new Dirawat : $under_treatment_cumulative Kasus";

        sendNotification($content, $heading);
    }

    /**
     * Handle the NationalCaseHistory "updated" event.
     *
     * @param  \App\Models\NationalCaseHistory  $nationalCaseHistory
     * @return void
     */
    public function updated(NationalCaseHistory $nationalCaseHistory)
    {
        //
    }

    /**
     * Handle the NationalCaseHistory "deleted" event.
     *
     * @param  \App\Models\NationalCaseHistory  $nationalCaseHistory
     * @return void
     */
    public function deleted(NationalCaseHistory $nationalCaseHistory)
    {
        //
    }

    /**
     * Handle the NationalCaseHistory "restored" event.
     *
     * @param  \App\Models\NationalCaseHistory  $nationalCaseHistory
     * @return void
     */
    public function restored(NationalCaseHistory $nationalCaseHistory)
    {
        //
    }

    /**
     * Handle the NationalCaseHistory "force deleted" event.
     *
     * @param  \App\Models\NationalCaseHistory  $nationalCaseHistory
     * @return void
     */
    public function forceDeleted(NationalCaseHistory $nationalCaseHistory)
    {
        //
    }
}
