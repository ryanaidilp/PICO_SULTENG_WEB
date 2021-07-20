<?php

namespace App\Services;

use App\Models\ProvinceCase;

class ProvinceCaseService
{
    public function all($province_id)
    {
        return ProvinceCase::with([
            "national_case:id,date"
        ])
            ->where("province_id", $province_id)->get();
    }

    public function latest($province_id)
    {
        return ProvinceCase::with(["national_case:id,date"])
            ->where("province_id", $province_id)
            ->latest("day")->first();
    }

    public function byDay($province_id, $day)
    {
        return ProvinceCase::with(["national_case:id,date"])
            ->where([
                ["province_id", "=", $province_id],
                ["day", "=", $day]
            ])->first();
    }
}
