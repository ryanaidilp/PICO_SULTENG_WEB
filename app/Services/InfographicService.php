<?php

namespace App\Services;

use App\Models\Infographic;
use App\Transformers\AppSerializer;
use App\Transformers\InfographicTransformer;

class InfographicService
{
    public function take($take)
    {
        if ($take <= 0) {
            return [];
        }

        $infographics = Infographic::with('images')->orderBy('id', 'desc')->take(5)->get();
        $infographics = fractal($infographics, new InfographicTransformer, new AppSerializer)->toArray();

        return $infographics;
    }

    public function all()
    {
        $infographics = Infographic::with('images')->orderBy('id', 'desc')->get();
        $infographics = fractal($infographics, new InfographicTransformer, new AppSerializer)->toArray();

        return $infographics;
    }
}
