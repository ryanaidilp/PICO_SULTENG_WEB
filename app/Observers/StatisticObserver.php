<?php

namespace App\Observers;

use App\Models\Gender;
use App\Models\Statistic;
use App\Models\TestHistory;

class StatisticObserver
{
    /**
     * Handle the Statistic "created" event.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return void
     */
    public function created(Statistic $statistic)
    {
        $gender = Gender::latest()->first();
        $testHistory = TestHistory::latest()->first();

        $new_gender = $gender->replicate();
        $new_history = $testHistory->replicate();

        $new_gender->day = $statistic->day;
        $new_history->id = $statistic->day;
        $new_history->day = $statistic->day;

        $positive_new =  formatCase($statistic->positive);
        $recovered_new =  formatCase($statistic->recovered);
        $deceased_new = formatCase($statistic->death);
        $under_treatment_new =  formatCase($statistic->positive - ($statistic->recovered + $statistic->death));

        $positive_cumulative = number_format($statistic->cumulative_positive, 0, ',', '.');
        $recovered_cumulative = number_format($statistic->cumulative_recovered, 0, ',', '.');
        $deceased_cumulative = number_format($statistic->cumulative_death, 0, ',', '.');;
        $under_treatment_cumulative = number_format($statistic->under_treatment, 0, ',', '.');

        $now = today()->translatedFormat('l, d F Y');
        $header = "Update COVID-19 di Sulawesi Tengah.  $now!";
        $content = "Kasus COVID-19 di Sulawesi Tengah sampai $now : 
        \n$positive_new Positif : $positive_cumulative Kasus
        \n$recovered_new Sembuh : $recovered_cumulative Kasus
        \n$deceased_new Meninggal : $deceased_cumulative Kasus
        \n$under_treatment_new Dirawat : $under_treatment_cumulative Kasus";

        sendNotification($content, $header);

        $new_gender->save();
        $new_history->save();
    }

    /**
     * Handle the Statistic "updated" event.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return void
     */
    public function updated(Statistic $statistic)
    {
        //
    }

    /**
     * Handle the Statistic "deleted" event.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return void
     */
    public function deleted(Statistic $statistic)
    {
        //
    }

    /**
     * Handle the Statistic "restored" event.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return void
     */
    public function restored(Statistic $statistic)
    {
        //
    }

    /**
     * Handle the Statistic "force deleted" event.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return void
     */
    public function forceDeleted(Statistic $statistic)
    {
        //
    }
}
