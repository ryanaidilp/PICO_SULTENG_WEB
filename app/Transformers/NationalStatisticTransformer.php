<?php

namespace App\Transformers;

use App\NationalCaseHistory;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;

class NationalStatisticTransformer extends TransformerAbstract
{
    public function transform(NationalCaseHistory $nationalCaseHistory)
    {
        return [
            Lang::get('general.day') => $nationalCaseHistory->day,
            Lang::get('general.date') => $nationalCaseHistory->date,
            Lang::get('general.cumulative') => [
                Lang::get('general.positive') => $nationalCaseHistory->cumulative_positive,
                Lang::get('general.recovered') => $nationalCaseHistory->cumulative_recovered,
                Lang::get('general.death') => $nationalCaseHistory->cumulative_deceased,
            ],
            Lang::get('general.new_case') => [
                Lang::get('general.positive') => $nationalCaseHistory->daily_positive_case,
                Lang::get('general.recovered') => $nationalCaseHistory->daily_recovered_case,
                Lang::get('general.death') => $nationalCaseHistory->daily_deceased_case,
            ],
        ];
    }
}
