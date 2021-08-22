<?php

namespace App\Services;

use App\Models\Village;
use App\Transformers\AppSerializer;
use App\Transformers\Api\v1\VillageTransformer;

class VillageService
{
    public function all($district_id)
    {
        $villages = Village::where('district_id', '=', $district_id)
            ->with('case')
            ->get();

        return $this->format($villages);
    }


    private function format($data)
    {
        return fractal($data, new VillageTransformer, new AppSerializer)->toArray();
    }
}
