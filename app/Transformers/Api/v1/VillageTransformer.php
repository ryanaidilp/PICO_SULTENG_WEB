<?php

namespace App\Transformers\Api\v1;

use App\Models\Village;
use League\Fractal\TransformerAbstract;

class VillageTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include.
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
    public function transform(Village $village)
    {
        return [
            'id' => $village->id,
            'name' => $village->name,
            'positive' => $village->case->cumulative_positive,
            'recovered' => $village->case->cumulative_recovered,
            'deceased' => $village->case->cumulative_deceased,
            'under_treatment' => $village->case->cumulative_under_treatment,
            'death_ratio' => $village->case->death_ratio,
            'updated_at' => $village->case->updated_at,
        ];
    }
}
