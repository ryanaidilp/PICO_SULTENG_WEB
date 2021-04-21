<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\District;
use App\Models\LocalCaseHistory;

class LocalCaseHistoryObserver
{
    /**
     * Handle the LocalCaseHistory "created" event.
     *
     * @param  \App\Models\LocalCaseHistory  $localCaseHistory
     * @return void
     */
    public function created(LocalCaseHistory $localCaseHistory)
    {
        $district = District::find($localCaseHistory->district_id);
        $district->positif += $localCaseHistory->positive;
        $district->negatif += $localCaseHistory->negative;
        $district->sembuh += $localCaseHistory->recovered;
        $district->meninggal += $localCaseHistory->death;
        $district->ODP += $localCaseHistory->new_ODP;
        $district->PDP += $localCaseHistory->new_PDP;
        $district->selesai_pemantauan += $localCaseHistory->finished_ODP;
        $district->selesai_pengawasan += $localCaseHistory->finished_PDP;
        $district->save();

        $now = Carbon::parse($localCaseHistory->stat->date)->translatedFormat('l, d F Y');

        $heading = "Update kasus COVID-19 di $district->kabupaten. $now!";

        $positive_new =  formatCase($localCaseHistory->positive);
        $recovered_new =  formatCase($localCaseHistory->recovered);
        $deceased_new = formatCase($localCaseHistory->death);
        $under_treatment_new =  formatCase($localCaseHistory->positive - ($localCaseHistory->recovered + $localCaseHistory->death));

        $positive_cumulative = number_format($district->positif, 0, ',', '.');
        $recovered_cumulative = number_format($district->sembuh, 0, ',', '.');
        $deceased_cumulative = number_format($district->meninggal, 0, ',', '.');
        $under_treatment_cumulative = number_format($district->positif - ($district->meninggal + $district->sembuh), 0, ',', '.');

        $content =  "Kasus COVID-19 di $district->kabupaten sampai $now :\n$positive_new Positif : $positive_cumulative Kasus\n$recovered_new Sembuh : $recovered_cumulative  Kasus\n$deceased_new Meninggal : $deceased_cumulative Kasus\n$under_treatment_new Dirawat : $under_treatment_cumulative Kasus";

        sendNotification($content, $heading);
    }

    /**
     * Handle the LocalCaseHistory "updated" event.
     *
     * @param  \App\Models\LocalCaseHistory  $localCaseHistory
     * @return void
     */
    public function updated(LocalCaseHistory $localCaseHistory)
    {
        //
    }

    /**
     * Handle the LocalCaseHistory "deleted" event.
     *
     * @param  \App\Models\LocalCaseHistory  $localCaseHistory
     * @return void
     */
    public function deleted(LocalCaseHistory $localCaseHistory)
    {
        //
    }

    /**
     * Handle the LocalCaseHistory "restored" event.
     *
     * @param  \App\Models\LocalCaseHistory  $localCaseHistory
     * @return void
     */
    public function restored(LocalCaseHistory $localCaseHistory)
    {
        //
    }

    /**
     * Handle the LocalCaseHistory "force deleted" event.
     *
     * @param  \App\Models\LocalCaseHistory  $localCaseHistory
     * @return void
     */
    public function forceDeleted(LocalCaseHistory $localCaseHistory)
    {
        //
    }
}
