<?php

namespace App\Services;

use App\Models\ProvinceGenderCase;
use App\Transformers\AppSerializer;
use App\Transformers\ProvinceGenderCaseTransformer;

class ProvinceGenderCaseService
{
    public function latest($province_id)
    {
        $case = ProvinceGenderCase::where('province_id', $province_id)->latest('day')->first();
        $case = fractal($case, new ProvinceGenderCaseTransformer, new AppSerializer)->toArray();

        return $case;
    }
}
