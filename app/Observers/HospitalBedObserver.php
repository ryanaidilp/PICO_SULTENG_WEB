<?php



namespace App\Observers;

use App\Models\HospitalBed;

class HospitalBedObserver
{
    /**
     * Handle the HospitalBed "saving" event.
     *
     * @param  \App\Models\HospitalBed  $bed
     * @return void
     */
    public function saving(HospitalBed $bed): void
    {
        if ($bed->available > $bed->total) {
            $bed->available = $bed->total;
        }

        $bed->occupied = $bed->total - $bed->available;
    }

    /**
     * Handle the HospitalBed "created" event.
     *
     * @param  \App\Models\HospitalBed  $bed
     * @return void
     */
    public function created(HospitalBed $bed): void
    {
        //
    }

    /**
     * Handle the HospitalBed "updated" event.
     *
     * @param  \App\Models\HospitalBed  $bed
     * @return void
     */
    public function updated(HospitalBed $bed): void
    {
        //
    }

    /**
     * Handle the HospitalBed "deleted" event.
     *
     * @param  \App\Models\HospitalBed  $bed
     * @return void
     */
    public function deleted(HospitalBed $bed): void
    {
        //
    }

    /**
     * Handle the HospitalBed "restored" event.
     *
     * @param  \App\Models\HospitalBed  $bed
     * @return void
     */
    public function restored(HospitalBed $bed): void
    {
        //
    }

    /**
     * Handle the HospitalBed "force deleted" event.
     *
     * @param  \App\Models\HospitalBed  $bed
     * @return void
     */
    public function forceDeleted(HospitalBed $bed): void
    {
        //
    }
}
