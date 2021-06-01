<?php

namespace App\Transformers;

use App\Models\District;
use App\Models\Statistic;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;

class StatisticTransformer extends TransformerAbstract
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
    public function transform(Statistic $stats)
    {
        $data = array();
        $histories = $stats->histories;
        $weekly_positive_avg = 0;
        $weekly_recovered_avg = 0;
        $weekly_death_avg = 0;
        $weekly_ODP_avg = 0;
        $weekly_PDP_avg = 0;
        foreach ($histories as $key => $history) {
            $district = $history->district;
            if ($history->day == 1) {
                $weekly_positive_avg = (float) round($history->where('day', $history->day)->sum('positive') / 1, 2);
                $weekly_recovered_avg = (float) round($history->where('day', $history->day)->sum('recovered') / 1, 2);
                $weekly_death_avg = (float) round($history->where('day', $history->day)->sum('death') / 1, 2);
                $weekly_ODP_avg = (float) round($history->where('day', $history->day)->sum('new_ODP') / 1, 2);
                $weekly_PDP_avg = (float) round($history->where('day', $history->day)->sum('new_PDP') / 1, 2);
            } elseif ($history->day == 2) {
                $weekly_positive_avg = (float) round($history->whereBetween('day', [$history->day - 1, $history->day])->sum('positive') / 2, 2);
                $weekly_recovered_avg = (float) round($history->whereBetween('day', [$history->day - 1, $history->day])->sum('recovered') / 2, 2);
                $weekly_death_avg = (float) round($history->whereBetween('day', [$history->day - 1, $history->day])->sum('death') / 2, 2);
                $weekly_ODP_avg = (float) round($history->whereBetween('day', [$history->day - 1, $history->day])->sum('new_ODP') / 2, 2);
                $weekly_PDP_avg = (float) round($history->whereBetween('day', [$history->day - 1, $history->day])->sum('new_PDP') / 2, 2);
            } elseif ($history->day == 3) {
                $weekly_positive_avg = (float) round($history->whereBetween('day', [$history->day - 2, $history->day])->sum('positive') / 3, 2);
                $weekly_recovered_avg = (float) round($history->whereBetween('day', [$history->day - 2, $history->day])->sum('recovered') / 3, 2);
                $weekly_death_avg = (float) round($history->whereBetween('day', [$history->day - 2, $history->day])->sum('death') / 3, 2);
                $weekly_ODP_avg = (float) round($history->whereBetween('day', [$history->day - 2, $history->day])->sum('new_ODP') / 3, 2);
                $weekly_PDP_avg = (float) round($history->whereBetween('day', [$history->day - 2, $history->day])->sum('new_PDP') / 3, 2);
            } elseif ($history->day == 4) {
                $weekly_positive_avg = (float) round($history->whereBetween('day', [$history->day - 3, $history->day])->sum('positive') / 4, 2);
                $weekly_recovered_avg = (float) round($history->whereBetween('day', [$history->day - 3, $history->day])->sum('recovered') / 4, 2);
                $weekly_death_avg = (float) round($history->whereBetween('day', [$history->day - 3, $history->day])->sum('death') / 4, 2);
                $weekly_ODP_avg = (float) round($history->whereBetween('day', [$history->day - 3, $history->day])->sum('new_ODP') / 4, 2);
                $weekly_PDP_avg = (float) round($history->whereBetween('day', [$history->day - 3, $history->day])->sum('new_PDP') / 4, 2);
            } elseif ($history->day == 5) {
                $weekly_positive_avg = (float) round($history->whereBetween('day', [$history->day - 4, $history->day])->sum('positive') / 5, 2);
                $weekly_recovered_avg = (float) round($history->whereBetween('day', [$history->day - 4, $history->day])->sum('recovered') / 5, 2);
                $weekly_death_avg = (float) round($history->whereBetween('day', [$history->day - 4, $history->day])->sum('death') / 5, 2);
                $weekly_ODP_avg = (float) round($history->whereBetween('day', [$history->day - 4, $history->day])->sum('new_ODP') / 5, 2);
                $weekly_PDP_avg = (float) round($history->whereBetween('day', [$history->day - 4, $history->day])->sum('new_PDP') / 5, 2);
            } elseif ($history->day == 6) {
                $weekly_positive_avg = (float) round($history->whereBetween('day', [$history->day - 5, $history->day])->sum('positive') / 6, 2);
                $weekly_recovered_avg = (float) round($history->whereBetween('day', [$history->day - 5, $history->day])->sum('recovered') / 6, 2);
                $weekly_death_avg = (float) round($history->whereBetween('day', [$history->day - 5, $history->day])->sum('death') / 6, 2);
                $weekly_ODP_avg = (float) round($history->whereBetween('day', [$history->day - 5, $history->day])->sum('new_ODP') / 6, 2);
                $weekly_PDP_avg = (float) round($history->whereBetween('day', [$history->day - 5, $history->day])->sum('new_PDP') / 6, 2);
            } elseif ($history->day >= 7) {
                $weekly_positive_avg = (float) round($history->whereBetween('day', [$history->day - 6, $history->day])->sum('positive') / 7, 2);
                $weekly_recovered_avg = (float) round($history->whereBetween('day', [$history->day - 6, $history->day])->sum('recovered') / 7, 2);
                $weekly_death_avg = (float) round($history->whereBetween('day', [$history->day - 6, $history->day])->sum('death') / 7, 2);
                $weekly_ODP_avg = (float) round($history->whereBetween('day', [$history->day - 6, $history->day])->sum('new_ODP') / 7, 2);
                $weekly_PDP_avg = (float) round($history->whereBetween('day', [$history->day - 6, $history->day])->sum('new_PDP') / 7, 2);
            }
            $total_odp = $history->whereBetween('day', [1, $stats->day])->where('district_id', $district->no)->sum('new_ODP');
            $total_pdp = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('new_PDP');
            $total_finished_odp = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('finished_ODP');
            $total_finished_pdp = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('finished_PDP');
            $total_positive = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('positive');
            $total_recovered = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('recovered');
            $total_death = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('death');
            $total_negative = $history->whereBetween('day', [1, $stats->day])->where('district_id', $history->district_id)->sum('negative');
            $data[$key][Lang::get('general.no')] = $district->no;
            $data[$key][Lang::get('general.name')] = $district->kabupaten;
            $data[$key][Lang::get('general.new_case')] = [
                Lang::get('general.positive') => $history->positive,
                Lang::get('general.recovered') => $history->recovered,
                Lang::get('general.death') => $history->death,
                Lang::get('general.negative') => $history->negative,
                Lang::get('general.ODP') => $history->new_ODP,
                Lang::get('general.PDP') => $history->new_PDP,
            ];
            $data[$key][Lang::get('general.active_case')] = [
                Lang::get('general.under_treatment') => $history->under_treatment,
                Lang::get('general.ODP') => $total_odp - $total_finished_odp,
                Lang::get('general.PDP') => $total_pdp - $total_finished_pdp,
            ];
            $data[$key][Lang::get('general.finished_case')] = [
                Lang::get('general.ODP') => $history->finished_ODP,
                Lang::get('general.PDP') => $history->finished_PDP,
            ];
            $data[$key][Lang::get('general.cumulative')] = [
                Lang::get('general.positive') => (int) $total_positive,
                Lang::get('general.recovered') => (int) $total_recovered,
                Lang::get('general.death') => (int) $total_death,
                Lang::get('general.negative') => (int) $total_negative,
                Lang::get('general.ODP') => (int) $total_odp,
                Lang::get('general.PDP') => (int) $total_pdp,
                Lang::get('general.finished_param', ['case' => 'ODP']) => (int) $total_finished_odp,
                Lang::get('general.finished_param', ['case' => 'PDP']) => (int) $total_finished_pdp,
            ];
        }

        return [
            Lang::get('general.day') => $stats->day,
            Lang::get('general.date') => $stats->date,
            Lang::get('general.new_case') => [
                Lang::get('general.positive') => $stats->positive,
                Lang::get('general.under_treatment') => $stats->new_under_treatment,
                Lang::get('general.recovered') => $stats->recovered,
                Lang::get('general.death') => $stats->death,
                Lang::get('general.negative') => $stats->negative,
                Lang::get('general.ODP') => $stats->new_ODP,
                Lang::get('general.PDP') => $stats->new_PDP,
            ],
            Lang::get('general.active_case') => [
                Lang::get('general.under_treatment') => $stats->under_treatment,
                Lang::get('general.ODP') => $stats->active_ODP,
                Lang::get('general.PDP') => $stats->active_PDP,
            ],
            Lang::get('general.finished_case') => [
                Lang::get('general.ODP') => $stats->finished_ODP,
                Lang::get('general.PDP') => $stats->finished_PDP,
            ],
            Lang::get('general.cumulative') => [
                Lang::get('general.positive') => $stats->cumulative_positive,
                Lang::get('general.recovered') => $stats->cumulative_recovered,
                Lang::get('general.death') => $stats->cumulative_death,
                Lang::get('general.negative') => $stats->cumulative_negative,
                Lang::get('general.ODP') => $stats->cumulative_ODP,
                Lang::get('general.PDP') => $stats->cumulative_PDP,
                Lang::get('general.finished_param', ['case' => 'ODP']) => $stats->cumulative_finished_ODP,
                Lang::get('general.finished_param', ['case' => 'PDP']) => $stats->cumulative_finished_PDP,
            ],
            Lang::get('general.recap') => [
                Lang::get('general.percentage') => [
                    Lang::get('general.death') => $stats->death_percentage,
                    Lang::get('general.recovered') => $stats->recovered_percentage,
                    Lang::get('general.under_treatment') => $stats->under_treatment_percentage,
                ],
                Lang::get('general.average') => [
                    Lang::get('general.positive') . '_weekly' => $weekly_positive_avg,
                    Lang::get('general.recovered') . '_weekly' => $weekly_recovered_avg,
                    Lang::get('general.death') . '_weekly' => $weekly_death_avg,
                    Lang::get('general.ODP') . '_weekly' => $weekly_ODP_avg,
                    Lang::get('general.PDP') . '_weekly' => $weekly_PDP_avg,
                ],
                'Rt' => $stats->Rt,
                'Rt_upper' => $stats->Rt_upper,
                'Rt_lower' => $stats->Rt_lower,
            ],
            Lang::get('general.district_list') => $data,
        ];
    }
}
