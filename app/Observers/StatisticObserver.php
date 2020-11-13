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
