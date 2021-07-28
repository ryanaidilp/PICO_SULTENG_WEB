<?php

namespace App\Observers;

use App\Models\NationalVaccine;

class NationalVaccineObserver
{
    /**
     * Handle the NationalVaccine "created" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function created(NationalVaccine $vaccine)
    {
        $latest = NationalVaccine::latest("day")->first();
        $vaccine->cumulative_first_vaccination_received = $latest->cumulative_first_vaccination_received + $vaccine->first_vaccination_received;
        $vaccine->cumulative_second_vaccination_received = $latest->cumulative_second_vaccination_received + $vaccine->second_vaccination_received;
        $vaccine->cumulative_elderly_first_vaccination_received = $latest->cumulative_elderly_first_vaccination_received + $vaccine->elderly_first_vaccination_received;
        $vaccine->cumulative_elderly_second_vaccination_received = $latest->cumulative_elderly_second_vaccination_received + $vaccine->elderly_second_vaccination_received;
        $vaccine->cumulative_health_worker_first_vaccination_received = $latest->cumulative_health_worker_first_vaccination_received + $vaccine->health_worker_first_vaccination_received;
        $vaccine->cumulative_health_worker_second_vaccination_received = $latest->cumulative_health_worker_second_vaccination_received + $vaccine->health_worker_second_vaccination_received;
        $vaccine->cumulative_public_officer_first_vaccination_received = $latest->cumulative_public_officer_first_vaccination_received + $vaccine->public_officer_first_vaccination_received;
        $vaccine->cumulative_public_officer_second_vaccination_received = $latest->cumulative_public_officer_second_vaccination_received + $vaccine->public_officer_second_vaccination_received;
    }

    /**
     * Handle the NationalVaccine "updated" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function updated(NationalVaccine $nationalVaccine)
    {
        //
    }

    /**
     * Handle the NationalVaccine "deleted" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function deleted(NationalVaccine $nationalVaccine)
    {
        //
    }

    /**
     * Handle the NationalVaccine "restored" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function restored(NationalVaccine $nationalVaccine)
    {
        //
    }

    /**
     * Handle the NationalVaccine "force deleted" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function forceDeleted(NationalVaccine $nationalVaccine)
    {
        //
    }
}
