<?php

namespace App\Observers;

use App\Models\ProvinceVaccine;

class ProvinceVaccineObserver
{
    public function creating(ProvinceVaccine $vaccine): void
    {
        $latest = ProvinceVaccine::latest('day')->where('province_id', $vaccine->province_id)->first();
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
     * Handle the ProvinceVaccine "created" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function created(ProvinceVaccine $vaccine): void
    {
        // code...
    }

    /**
     * Handle the ProvinceVaccine "updated" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function updated(ProvinceVaccine $vaccine): void
    {
        //
    }

    /**
     * Handle the ProvinceVaccine "deleted" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function deleted(ProvinceVaccine $vaccine): void
    {
        //
    }

    /**
     * Handle the ProvinceVaccine "restored" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function restored(ProvinceVaccine $vaccine): void
    {
        //
    }

    /**
     * Handle the ProvinceVaccine "force deleted" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function forceDeleted(ProvinceVaccine $vaccine): void
    {
        //
    }
}
