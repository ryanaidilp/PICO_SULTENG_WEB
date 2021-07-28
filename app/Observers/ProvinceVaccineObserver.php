<?php

namespace App\Observers;

use App\Models\ProvinceVaccine;

class ProvinceVaccineObserver
{
    public function function(ProvinceVaccine $vaccine)
    {
        $latest = ProvinceVaccine::latest("day")->first();
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
     * Handle the ProvinceVaccine "created" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function created(ProvinceVaccine $vaccine)
    {
        # code...
    }

    /**
     * Handle the ProvinceVaccine "updated" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function updated(ProvinceVaccine $vaccine)
    {
        //
    }

    /**
     * Handle the ProvinceVaccine "deleted" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function deleted(ProvinceVaccine $vaccine)
    {
        //
    }

    /**
     * Handle the ProvinceVaccine "restored" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function restored(ProvinceVaccine $vaccine)
    {
        //
    }

    /**
     * Handle the ProvinceVaccine "force deleted" event.
     *
     * @param  \App\Models\ProvinceVaccine  $vaccine
     * @return void
     */
    public function forceDeleted(ProvinceVaccine $vaccine)
    {
        //
    }
}
