<?php

namespace App\Transformers;

use App\Models\NationalCaseHistory;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;

class NationalStatisticTransformer extends TransformerAbstract
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
    public function transform(NationalCaseHistory $nationalCaseHistory)
    {
        $weekly_positive_avg = 0;
        $weekly_recovered_avg = 0;
        $weekly_death_avg = 0;
        if ($nationalCaseHistory->day == 1) {
            $weekly_positive_avg = (float) round($nationalCaseHistory->where('day', $nationalCaseHistory->day)->sum('daily_positive_case') / 1, 2);
            $weekly_recovered_avg = (float) round($nationalCaseHistory->where('day', $nationalCaseHistory->day)->sum('daily_recovered_case') / 1, 2);
            $weekly_death_avg = (float) round($nationalCaseHistory->where('day', $nationalCaseHistory->day)->sum('daily_deceased_case') / 1, 2);
        } elseif ($nationalCaseHistory->day == 2) {
            $weekly_positive_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 1, $nationalCaseHistory->day])->sum('daily_positive_case') / 2, 2);
            $weekly_recovered_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 1, $nationalCaseHistory->day])->sum('daily_recovered_case') / 2, 2);
            $weekly_death_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 1, $nationalCaseHistory->day])->sum('daily_deceased_case') / 2, 2);
        } elseif ($nationalCaseHistory->day == 3) {
            $weekly_positive_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 2, $nationalCaseHistory->day])->sum('daily_positive_case') / 3, 2);
            $weekly_recovered_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 2, $nationalCaseHistory->day])->sum('daily_recovered_case') / 3, 2);
            $weekly_death_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 2, $nationalCaseHistory->day])->sum('daily_deceased_case') / 3, 2);
        } elseif ($nationalCaseHistory->day == 4) {
            $weekly_positive_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 3, $nationalCaseHistory->day])->sum('daily_positive_case') / 4, 2);
            $weekly_recovered_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 3, $nationalCaseHistory->day])->sum('daily_recovered_case') / 4, 2);
            $weekly_death_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 3, $nationalCaseHistory->day])->sum('daily_deceased_case') / 4, 2);
        } elseif ($nationalCaseHistory->day == 5) {
            $weekly_positive_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 4, $nationalCaseHistory->day])->sum('daily_positive_case') / 5, 2);
            $weekly_recovered_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 4, $nationalCaseHistory->day])->sum('daily_recovered_case') / 5, 2);
            $weekly_death_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 4, $nationalCaseHistory->day])->sum('daily_deceased_case') / 5, 2);
        } elseif ($nationalCaseHistory->day == 6) {
            $weekly_positive_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 5, $nationalCaseHistory->day])->sum('daily_positive_case') / 6, 2);
            $weekly_recovered_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 5, $nationalCaseHistory->day])->sum('daily_recovered_case') / 6, 2);
            $weekly_death_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 5, $nationalCaseHistory->day])->sum('daily_deceased_case') / 6, 2);
        } elseif ($nationalCaseHistory->day > 7) {
            $weekly_positive_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 6, $nationalCaseHistory->day])->sum('daily_positive_case') / 7, 2);
            $weekly_recovered_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 6, $nationalCaseHistory->day])->sum('daily_recovered_case') / 7, 2);
            $weekly_death_avg = (float) round($nationalCaseHistory->whereBetween('day', [$nationalCaseHistory->day - 6, $nationalCaseHistory->day])->sum('daily_deceased_case') / 7, 2);
        }

        return [
            Lang::get('general.day') => $nationalCaseHistory->day,
            Lang::get('general.date') => $nationalCaseHistory->date,
            Lang::get('general.cumulative') => [
                Lang::get('general.positive') => $nationalCaseHistory->cumulative_positive,
                Lang::get('general.under_treatment') => $nationalCaseHistory->cumulative_under_treatment,
                Lang::get('general.recovered') => $nationalCaseHistory->cumulative_recovered,
                Lang::get('general.death') => $nationalCaseHistory->cumulative_deceased,
            ],
            Lang::get('general.new_case') => [
                Lang::get('general.positive') => $nationalCaseHistory->daily_positive_case,
                Lang::get('general.under_treatment') => $nationalCaseHistory->daily_under_treatment_case,
                Lang::get('general.recovered') => $nationalCaseHistory->daily_recovered_case,
                Lang::get('general.death') => $nationalCaseHistory->daily_deceased_case,
            ],
            Lang::get('general.recap') => [
                Lang::get('general.average') => [
                    Lang::get('general.positive') . '_weekly' => $weekly_positive_avg,
                    Lang::get('general.recovered') . '_weekly' => $weekly_recovered_avg,
                    Lang::get('general.death') . '_weekly' => $weekly_death_avg,
                ],
            ],
        ];
    }
}
