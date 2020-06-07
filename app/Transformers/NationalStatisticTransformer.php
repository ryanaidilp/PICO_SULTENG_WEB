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
            Lang::get('general.recap') => [
                Lang::get('general.average') => [
                    Lang::get('general.positive').'_weekly' => $nationalCaseHistory->day > 7 ?
                (float) number_format(NationalCaseHistory::whereBetween('day', [$nationalCaseHistory->day - 7, $nationalCaseHistory->day])->sum('daily_positive_case') / 7, 2)
                : 0,
                    Lang::get('general.recovered').'_weekly' => $nationalCaseHistory->day > 7 ?
                (float) number_format(NationalCaseHistory::whereBetween('day', [$nationalCaseHistory->day - 7, $nationalCaseHistory->day])->sum('daily_recovered_case') / 7, 2)
                : 0,
                    Lang::get('general.death').'_weekly' => $nationalCaseHistory->day > 7 ?
                (float) number_format(NationalCaseHistory::whereBetween('day', [$nationalCaseHistory->day - 7, $nationalCaseHistory->day])->sum('daily_deceased_case') / 7, 2)
                : 0,
                ],
            ],
        ];
    }
}
