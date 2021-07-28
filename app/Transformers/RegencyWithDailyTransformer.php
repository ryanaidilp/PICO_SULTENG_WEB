<?php

namespace App\Transformers;

use App\Models\Regency;
use League\Fractal\TransformerAbstract;
use App\Transformers\RegencyCaseTransformer;

class RegencyWithDailyTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        "daily"
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Regency $regency)
    {
        return [
            "id" => (int) $regency->id,
            "name" => $regency->name,
        ];
    }

    public function includeDaily(Regency $regency)
    {
        return $this->collection($regency->cases, new RegencyCaseTransformer);
    }
}
