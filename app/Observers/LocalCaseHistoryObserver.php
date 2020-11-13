<?php

namespace App\Observers;

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
    public function created(LocalCaseHistory $created)
    {
        $district = District::find($created->district_id);
        $district->positif += $created->positive;
        $district->negatif += $created->negative;
        $district->sembuh += $created->recovered;
        $district->meninggal += $created->death;
        $district->ODP += $created->new_ODP;
        $district->PDP += $created->new_PDP;
        $district->selesai_pemantauan += $created->finished_ODP;
        $district->selesai_pengawasan += $created->finished_PDP;
        $district->save();
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
