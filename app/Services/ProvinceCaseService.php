<?php

namespace App\Services;

use App\Models\ProvinceCase;
use App\Transformers\AppSerializer;
use App\Transformers\ProvinceCaseTransformer;

class ProvinceCaseService
{
    public function all($province_id)
    {
        $cases = ProvinceCase::with([
            "national_case:id,date"
        ])
            ->where("province_id", $province_id)->get();
        return $this->format($cases);
    }

    public function latest($province_id)
    {
        $data = ProvinceCase::with(["national_case:id,date"])
            ->where("province_id", $province_id)
            ->latest("day")->first();
        return $this->format($data);
    }

    public function byDay($province_id, $day)
    {
        $data = ProvinceCase::with(["national_case:id,date"])
            ->where([
                ["province_id", "=", $province_id],
                ["day", "=", $day]
            ])->first();
        return $this->format($data);
    }

    private function format($data)
    {
        return \fractal($data, new ProvinceCaseTransformer, new AppSerializer)->toArray();
    }
}
