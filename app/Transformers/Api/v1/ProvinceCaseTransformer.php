<?php

declare(strict_types=1);

namespace App\Transformers\Api\v1;

use App\Models\ProvinceCase;
use Illuminate\Support\Carbon;
use League\Fractal\TransformerAbstract;

class ProvinceCaseTransformer extends TransformerAbstract
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
    public function transform(ProvinceCase $case)
    {
        return [
            'day' => $case->day,
            'date' => Carbon::parse($case->national_case->date),
            'positive' => $case->positive,
            'recovered' => $case->recovered,
            'deceased' => $case->deceased,
            'under_treatment' => $case->under_treatment,
            'person_under_observation' => $case->person_under_observation,
            'person_under_supervision' => $case->person_under_supervision,
            'finished_observation'  => $case->finished_person_under_observation,
            'finished_supervision' => $case->finished_person_under_supervision,
            'cumulative_positive' => $case->cumulative_positive,
            'cumulative_recovered' => $case->cumulative_recovered,
            'cumulative_deceased' => $case->cumulative_deceased,
            'cumulative_under_treatment' => $case->cumulative_under_treatment,
            'cumulative_person_under_observation' => $case->cumulative_person_under_observation,
            'cumulative_person_under_supervision' => $case->cumulative_person_under_supervision,
            'cumulative_finished_observation' => $case->cumulative_finished_person_under_observation,
            'cumulative_finished_supervision' => $case->cumulative_finished_person_under_supervision,
            'rt' => $case->rt,
            'rt_upper' => $case->rt_upper,
            'rt_lower' => $case->rt_lower,
            'death_ratio' => $case->death_ratio,
        ];
    }
}
