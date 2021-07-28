<?php

namespace App\Services;

use App\Models\Province;
use App\Transformers\AppSerializer;
use App\Transformers\Api\v1\ProvinceTransformer;

class ProvinceService
{
    public function all()
    {
        $provinces = Province::with(["case"])->get();
        $provinces = \fractal($provinces, new ProvinceTransformer, new AppSerializer)->toArray();
        return $provinces;
    }
}
