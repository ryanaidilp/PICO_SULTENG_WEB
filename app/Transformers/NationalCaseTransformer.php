<?php

namespace App\Transformers;

use App\Models\NationalCase;
use League\Fractal\TransformerAbstract;

class NationalCaseTransformer extends TransformerAbstract
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
    public function transform(NationalCase $case)
    {
        return [
            __("general.day") => $case->day,
            __("general.date") => $case->date,
            __("general.new_case") => [
                __("general.positive") => $case->positive,
                __("general.recovered") => $case->recovered,
                __("general.death") =>  $case->deceased,
                __("general.under_treatment") => $case->under_treatment,
            ],
            __("general.cumulative") => [
                __("general.positive") => $case->cumulative_positive,
                __("general.recovered") => $case->cumulative_recovered,
                __("general.death") =>  $case->cumulative_deceased,
                __("general.under_treatment") => $case->cumulative_under_treatment,
            ]
        ];
    }
}
