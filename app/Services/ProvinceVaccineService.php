<?php

namespace  App\Services;

use App\Models\ProvinceVaccine;

class ProvinceVaccineService
{
    public function all($province_id)
    {
        return ProvinceVaccine::where("province_id", $province_id)->get();
    }

    public function latest($province_id)
    {
        $province_vaccines = ProvinceVaccine::where("province_id", $province_id)->latest("day")->take(2)->get();
        $province_vaccine_last = $province_vaccines->last();
        $province_vaccine = $province_vaccines->first();
        $province_vaccine->first_vaccination_received_changes = $province_vaccine->first_vaccination_received - $province_vaccine_last->first_vaccination_received;
        $province_vaccine->first_vaccination_received_changes_rate = \calculateRate($province_vaccine->first_vaccination_received_changes, $province_vaccine_last->first_vaccination_received);
        $province_vaccine->second_vaccination_received_changes = $province_vaccine->second_vaccination_received - $province_vaccine_last->second_vaccination_received;
        $province_vaccine->second_vaccination_received_changes_rate = \calculateRate($province_vaccine->second_vaccination_received_changes, $province_vaccine_last->second_vaccination_received);
        $province_vaccine->health_worker_first_vaccination_received_changes =  $province_vaccine->health_worker_first_vaccination_received - $province_vaccine_last->health_worker_first_vaccination_received;
        $province_vaccine->health_worker_first_vaccination_received_changes_rate = \calculateRate($province_vaccine->health_worker_first_vaccination_received_changes, $province_vaccine_last->health_worker_first_vaccination_received);
        $province_vaccine->health_worker_second_vaccination_received_changes =  $province_vaccine->health_worker_second_vaccination_received - $province_vaccine_last->health_worker_second_vaccination_received;
        $province_vaccine->health_worker_second_vaccination_received_changes_rate = \calculateRate($province_vaccine->health_worker_second_vaccination_received_changes, $province_vaccine_last->health_worker_second_vaccination_received);
        $province_vaccine->elderly_first_vaccination_received_changes =  $province_vaccine->elderly_first_vaccination_received - $province_vaccine_last->elderly_first_vaccination_received;
        $province_vaccine->elderly_first_vaccination_received_changes_rate = \calculateRate($province_vaccine->elderly_first_vaccination_received_changes, $province_vaccine_last->elderly_first_vaccination_received);
        $province_vaccine->elderly_second_vaccination_received_changes = $province_vaccine->elderly_second_vaccination_received - $province_vaccine_last->elderly_second_vaccination_received;
        $province_vaccine->elderly_second_vaccination_received_changes_rate = \calculateRate($province_vaccine->elderly_second_vaccination_received_changes, $province_vaccine_last->elderly_second_vaccination_received);
        $province_vaccine->public_officer_first_vaccination_received_changes =  $province_vaccine->public_officer_first_vaccination_received - $province_vaccine_last->public_officer_first_vaccination_received;
        $province_vaccine->public_officer_first_vaccination_received_changes_rate = \calculateRate($province_vaccine->public_officer_first_vaccination_received_changes, $province_vaccine_last->public_officer_first_vaccination_received);
        $province_vaccine->public_officer_second_vaccination_received_changes =  $province_vaccine->public_officer_second_vaccination_received - $province_vaccine_last->public_officer_second_vaccination_received;
        $province_vaccine->public_officer_second_vaccination_received_changes_rate = \calculateRate($province_vaccine->public_officer_second_vaccination_received_changes, $province_vaccine_last->public_officer_second_vaccination_received);
        $province_vaccine->public_first_vaccination_received_changes = $province_vaccine->public_first_vaccination_received - $province_vaccine_last->public_first_vaccination_received;
        $province_vaccine->public_first_vaccination_received_changes_rate = \calculateRate($province_vaccine->public_first_vaccination_received_changes, $province_vaccine_last->public_first_vaccination_received);
        $province_vaccine->public_second_vaccination_received_changes = $province_vaccine->public_second_vaccination_received - $province_vaccine_last->public_second_vaccination_received;
        $province_vaccine->public_second_vaccination_received_changes_rate = \calculateRate($province_vaccine->public_second_vaccination_received_changes, $province_vaccine_last->public_second_vaccination_received);
        $province_vaccine->teenager_first_vaccination_received_changes = $province_vaccine->teenager_first_vaccination_received - $province_vaccine_last->teenager_first_vaccination_received;
        $province_vaccine->teenager_first_vaccination_received_changes_rate = \calculateRate($province_vaccine->teenager_first_vaccination_received_changes, $province_vaccine_last->teenager_first_vaccination_received);
        $province_vaccine->teenager_second_vaccination_received_changes = $province_vaccine->teenager_second_vaccination_received - $province_vaccine_last->teenager_second_vaccination_received;
        $province_vaccine->teenager_second_vaccination_received_changes_rate = \calculateRate($province_vaccine->teenager_second_vaccination_received_changes, $province_vaccine_last->teenager_second_vaccination_received);
        return $province_vaccine;
    }
}
