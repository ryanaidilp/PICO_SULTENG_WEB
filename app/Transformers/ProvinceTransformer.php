<?php

namespace App\Transformers;

use App\Models\Province;
use League\Fractal\TransformerAbstract;

class ProvinceTransformer extends TransformerAbstract
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
    public function transform(Province $province)
    {
        $case = $province->case->first;
        return [
            __("general.province_code") => $province->id,
            __("general.province") => $province->name,
            __("general.map_id") => $province->map_id,
            __("general.updated_at") => $case->updated_at,
            __("general.positive") => $case->cumulative_positive,
            __("general.recovered") => $case->cumulative_recovered,
            __("general.death") => $case->cumulative_deceased,
            __("general.under_treatment") => $case->cumulative_under_treatment,
            __("general.ODP") => $case->person_under_obervation,
            __("general.finished_param", ["case" => "pemantauan"]) => $case->finished_person_under_observation,
            __("general.active_param", ["case" => "pemantauan"]) => $case->active_person_under_observation,
            __("general.PDP") => $case->person_under_supervision,
            __("general.finished_param", ["case" => "pengawasan"]) => $case->finished_person_under_supervision,
            __("general.active_param", ["case" => "pengawasan"]) => $case->active_person_under_supervision,
            __("general.death_rate") => $case->death_ratio,

        ];
    }
}
