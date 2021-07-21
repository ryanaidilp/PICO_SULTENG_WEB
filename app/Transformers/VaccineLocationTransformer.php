<?php

namespace App\Transformers;

use App\Models\VaccineLocation;
use League\Fractal\TransformerAbstract;

class VaccineLocationTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
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
    public function transform(VaccineLocation $vaccine_location)
    {
        return [
            "name" => $vaccine_location->name,
            "regency_name" => $vaccine_location->regency->name,
            "address" => $vaccine_location->address,
            "operational_time" => $vaccine_location->operational_time,
            "is_first_vaccination" => $vaccine_location->is_first_vaccination,
            "is_second_vaccination" => $vaccine_location->is_second_vaccination,
            "daily_vaccination_quota" => $vaccine_location->daily_vaccination_quota,
            "vaccination_stock_remaining" => $vaccine_location->vaccination_stock_remaining,
            "notes" => $vaccine_location->notes,
            "updated_at" => $vaccine_location->updated_at,
        ];
    }
}
