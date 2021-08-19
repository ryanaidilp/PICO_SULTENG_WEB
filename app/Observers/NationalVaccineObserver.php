<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\NationalVaccine;

class NationalVaccineObserver
{
    public function creating(NationalVaccine $vaccine): void
    {
        $latest = NationalVaccine::latest('day')->first();
        $vaccine->first_vaccination_received = $vaccine->cumulative_first_vaccination_received - $latest->cumulative_first_vaccination_received;
        $vaccine->second_vaccination_received = $vaccine->cumulative_second_vaccination_received - $latest->cumulative_second_vaccination_received;
        $vaccine->elderly_first_vaccination_received = $vaccine->cumulative_elderly_first_vaccination_received - $latest->cumulative_elderly_first_vaccination_received;
        $vaccine->elderly_second_vaccination_received = $vaccine->cumulative_elderly_second_vaccination_received - $latest->cumulative_elderly_second_vaccination_received;
        $vaccine->health_worker_first_vaccination_received = $vaccine->cumulative_health_worker_first_vaccination_received - $latest->cumulative_health_worker_first_vaccination_received;
        $vaccine->health_worker_second_vaccination_received = $vaccine->cumulative_health_worker_second_vaccination_received - $latest->cumulative_health_worker_second_vaccination_received;
        $vaccine->public_officer_first_vaccination_received = $vaccine->cumulative_public_officer_first_vaccination_received - $latest->cumulative_public_officer_first_vaccination_received;
        $vaccine->public_officer_second_vaccination_received = $vaccine->cumulative_public_officer_second_vaccination_received - $latest->cumulative_public_officer_second_vaccination_received;
        $vaccine->public_first_vaccination_received = $vaccine->cumulative_public_first_vaccination_received - $latest->cumulative_public_first_vaccination_received;
        $vaccine->public_second_vaccination_received = $vaccine->cumulative_public_second_vaccination_received - $latest->cumulative_public_second_vaccination_received;
        $vaccine->teenager_first_vaccination_received = $vaccine->cumulative_teenager_first_vaccination_received - $latest->cumulative_teenager_first_vaccination_received;
        $vaccine->teenager_second_vaccination_received = $vaccine->cumulative_teenager_second_vaccination_received - $latest->cumulative_teenager_second_vaccination_received;
    }

    /**
     * Handle the NationalVaccine "created" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function created(NationalVaccine $vaccine): void
    {
        // code...
    }

    /**
     * Handle the NationalVaccine "updated" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function updated(NationalVaccine $nationalVaccine): void
    {
        //
    }

    /**
     * Handle the NationalVaccine "deleted" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function deleted(NationalVaccine $nationalVaccine): void
    {
        //
    }

    /**
     * Handle the NationalVaccine "restored" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function restored(NationalVaccine $nationalVaccine): void
    {
        //
    }

    /**
     * Handle the NationalVaccine "force deleted" event.
     *
     * @param  \App\Models\NationalVaccine  $nationalVaccine
     * @return void
     */
    public function forceDeleted(NationalVaccine $nationalVaccine): void
    {
        //
    }
}
