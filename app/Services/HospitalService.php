<?php

namespace App\Services;

use App\Models\Hospital;
use App\Transformers\AppSerializer;
use App\Transformers\HospitalTransformer;

class HospitalService
{
    public function all($province_id)
    {
        $hospitals = Hospital::where("regency_id", "LIKE", "$province_id%")
            ->with(["contacts", "beds"])
            ->withCount(["beds as igd_count" => function ($query) {
                $query->select("available")->where("hospital_bed_type_id", 1);
            }])
            ->get();
        $hospitals = \fractal($hospitals, new HospitalTransformer, new AppSerializer)->toArray();
        return $hospitals;
    }
}
