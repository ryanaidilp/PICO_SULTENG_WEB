<?php

namespace App\Transformers\Api\v1;

use Carbon\Carbon;
use App\Models\NationalCase;
use League\Fractal\TransformerAbstract;

class NationalCaseTransformer extends TransformerAbstract
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
    public function transform(NationalCase $case)
    {
        return [
            'day' => $case->day,
            'date' => Carbon::parse($case->date),
            'positive' => $case->positive,
            'recovered' => $case->recovered,
            'deceased' => $case->deceased,
            'under_treatment' => $case->under_treatment,
            'cumulative_positive' => $case->cumulative_positive,
            'cumulative_recovered' => $case->cumulative_recovered,
            'cumulative_deceased' => $case->cumulative_deceased,
            'cumulative_under_treatment' => $case->cumulative_under_treatment,
            'rt' => $case->rt,
            'rt_upper' => $case->rt_upper,
            'rt_lower' => $case->rt_lower,
            'death_ratio' => $case->death_ratio,
        ];
    }
}
