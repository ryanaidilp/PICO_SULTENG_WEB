<?php

namespace App\Services;

use App\Models\NationalVaccine;

class NationalVaccineService
{
    public function all()
    {
        return NationalVaccine::all();
    }

    public function latest()
    {
        $vaccines = NationalVaccine::latest("day")->take(2)->get();
        $vaccine_last = $vaccines->last();
        $vaccine = $vaccines->first();
        $vaccine->first_vaccination_received_changes = $vaccine->first_vaccination_received - $vaccine_last->first_vaccination_received;
        $vaccine->first_vaccination_received_changes_rate = \calculateRate($vaccine->first_vaccination_received_changes, $vaccine_last->first_vaccination_received);
        $vaccine->second_vaccination_received_changes = $vaccine->second_vaccination_received - $vaccine_last->second_vaccination_received;
        $vaccine->second_vaccination_received_changes_rate = \calculateRate($vaccine->second_vaccination_received_changes, $vaccine_last->second_vaccination_received);
        $vaccine->health_worker_first_vaccination_received_changes = $vaccine->health_worker_first_vaccination_received - $vaccine_last->health_worker_first_vaccination_received;
        $vaccine->health_worker_first_vaccination_received_changes_rate = \calculateRate($vaccine->health_worker_first_vaccination_received_changes, $vaccine_last->health_worker_first_vaccination_received);
        $vaccine->health_worker_second_vaccination_received_changes = $vaccine->health_worker_second_vaccination_received - $vaccine_last->health_worker_second_vaccination_received;
        $vaccine->health_worker_second_vaccination_received_changes_rate = \calculateRate($vaccine->health_worker_second_vaccination_received_changes, $vaccine_last->health_worker_second_vaccination_received);
        $vaccine->elderly_first_vaccination_received_changes = $vaccine->elderly_first_vaccination_received - $vaccine_last->elderly_first_vaccination_received;
        $vaccine->elderly_first_vaccination_received_changes_rate = \calculateRate($vaccine->elderly_first_vaccination_received_changes, $vaccine_last->elderly_first_vaccination_received);
        $vaccine->elderly_second_vaccination_received_changes = $vaccine->elderly_second_vaccination_received - $vaccine_last->elderly_second_vaccination_received;
        $vaccine->elderly_second_vaccination_received_changes_rate = \calculateRate($vaccine->elderly_second_vaccination_received_changes, $vaccine_last->elderly_second_vaccination_received);
        $vaccine->public_officer_first_vaccination_received_changes = $vaccine->public_officer_first_vaccination_received - $vaccine_last->public_officer_first_vaccination_received;
        $vaccine->public_officer_first_vaccination_received_changes_rate = \calculateRate($vaccine->public_officer_first_vaccination_received_changes, $vaccine_last->public_officer_first_vaccination_received);
        $vaccine->public_officer_second_vaccination_received_changes = $vaccine->public_officer_second_vaccination_received - $vaccine_last->public_officer_second_vaccination_received;
        $vaccine->public_officer_second_vaccination_received_changes_rate = \calculateRate($vaccine->public_officer_second_vaccination_received_changes, $vaccine_last->public_officer_second_vaccination_received);
        $vaccine->public_first_vaccination_received_changes = $vaccine->public_first_vaccination_received - $vaccine_last->public_first_vaccination_received;
        $vaccine->public_first_vaccination_received_changes_rate = \calculateRate($vaccine->public_first_vaccination_received_changes, $vaccine_last->public_first_vaccination_received);
        $vaccine->public_second_vaccination_received_changes = $vaccine->public_second_vaccination_received - $vaccine_last->public_second_vaccination_received;
        $vaccine->public_second_vaccination_received_changes_rate = \calculateRate($vaccine->public_second_vaccination_received_changes, $vaccine_last->public_second_vaccination_received);
        $vaccine->teenager_first_vaccination_received_changes = $vaccine->teenager_first_vaccination_received - $vaccine_last->teenager_first_vaccination_received;
        $vaccine->teenager_first_vaccination_received_changes_rate = \calculateRate($vaccine->teenager_first_vaccination_received_changes, $vaccine_last->teenager_first_vaccination_received);
        $vaccine->teenager_second_vaccination_received_changes = $vaccine->teenager_second_vaccination_received - $vaccine_last->teenager_second_vaccination_received;
        $vaccine->teenager_second_vaccination_received_changes_rate = \calculateRate($vaccine->teenager_second_vaccination_received_changes, $vaccine_last->teenager_second_vaccination_received);
        return $vaccine;
    }
}
