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
            ->with(["contacts"])->get();
        $hospitals = \fractal($hospitals, new HospitalTransformer, new AppSerializer)->toArray();
        return $hospitals;
    }
}
