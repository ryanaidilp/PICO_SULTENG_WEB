<?php

declare(strict_types=1);

namespace App\Transformers\Api\v1;

use App\Models\Province;
use League\Fractal\TransformerAbstract;

class ProvinceTransformer extends TransformerAbstract
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
        'daily',
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Province $province)
    {
        return [
            'id' => $province->id,
            'name' => $province->name,
            'positive' => $province->case->cumulative_positive,
            'recovered' => $province->case->cumulative_recovered,
            'deceased' => $province->case->cumulative_deceased,
            'under_treatment' => $province->case->cumulative_under_treatment,
            'map_id' => $province->map_id,
            'death_ratio' => $province->case->death_ratio,
            'updated_at' => $province->case->updated_at,
        ];
    }

    public function includeDaily(Province $province)
    {
        $province->load(['cases', 'cases.national_case:id,date']);

        return $this->collection($province->cases, new ProvinceCaseTransformer);
    }
}
