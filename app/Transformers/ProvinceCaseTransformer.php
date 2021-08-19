<?php



namespace App\Transformers;

use App\Models\ProvinceCase;
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
            __('general.day') => $case->day,
            __('general.date') => $case->national_case->date,
            __('general.new_case') => [
                __('general.positive') => $case->positive,
                __('general.under_treatment') => $case->under_treatment,
                __('general.recovered') => $case->recovered,
                __('general.death') => $case->deceased,
                __('general.negative') => $case->negative,
                __('general.ODP') => $case->person_under_observation,
                __('general.PDP') => $case->person_under_supervision,
            ],
            __('general.active_case') => [
                __('general.under_treatment') => $case->cumulative_under_treatment,
                __('general.ODP') => $case->active_person_under_observation,
                __('general.PDP') => $case->active_person_under_supervision,
            ],
            __('general.finished_case') => [
                __('general.ODP') => $case->finished_person_under_observation,
                __('general.PDP') => $case->finished_person_under_supervision,
            ],
            __('general.cumulative') => [
                __('general.positive') => $case->cumulative_positive,
                __('general.recovered') => $case->cumulative_recovered,
                __('general.death') => $case->cumulative_deceased,
                __('general.negative') => $case->cumulative_negative,
                __('general.ODP') => $case->cumulative_person_under_observation,
                __('general.PDP') => $case->cumulative_person_under_supervision,
                __('general.finished_param', ['case' => 'ODP']) => $case->cumulative_finished_person_under_observation,
                __('general.finished_param', ['case' => 'PDP']) => $case->cumulative_finished_person_under_supervision,
            ],
            __('general.recap') => [
                'Rt' => $case->rt,
                'Rt_upper' => $case->rt_upper,
                'Rt_lower' => $case->rt_lower,
            ],
        ];
    }
}
