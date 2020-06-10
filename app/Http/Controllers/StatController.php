<?php

namespace App\Http\Controllers;

use App\Helper\PicoHelper;
use App\LocalCaseHistory;
use App\Stat;
use App\Transformers\StatisticTransformer;
use Illuminate\Support\Facades\Lang;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class StatController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function index()
    {
        $stat = Stat::all();
        $resource = new Collection($stat, new StatisticTransformer());
        $data = $this->fractal->createData($resource)->toArray();

        return response(array_replace(PicoHelper::setJson([], true, []), $data), 200);
    }

    public function getDistrictHistory($no)
    {
        $localcase = LocalCaseHistory::where('district_id', $no)->get();
        $stat = Stat::all();
        $resource = new Collection($stat, new StatisticTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        $array = array();
        foreach ($data['data'] as $key => $st) {
            foreach ($localcase as $local) {
                $array[$key][Lang::get('general.day')] = $st['hari_ke'];
                $array[$key][Lang::get('general.date')] = $st['tanggal'];
                if ($st['hari_ke'] == $local['day']) {
                    $array[$key]['kasus_baru']['ODP'] = $local->new_ODP;
                    $array[$key]['kasus_baru']['positif'] = $local->positive;
                    $array[$key]['kasus_baru']['negatif'] = $local->negative;
                    $array[$key]['kasus_baru']['sembuh'] = $local->recovered;
                    $array[$key]['kasus_baru']['meninggal'] = $local->death;
                    $array[$key]['kasus_baru']['PDP'] = $local->new_PDP;
                    $array[$key]['selesai']['ODP'] = $local->finished_ODP;
                    $array[$key]['selesai']['PDP'] = $local->finished_PDP;
                }
                $array[$key]['kumulatif']['ODP'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('new_ODP');
                $array[$key]['kumulatif']['PDP'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('new_PDP');
                $array[$key]['kumulatif']['positif'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('positive');
                $array[$key]['kumulatif']['negatif'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('negative');
                $array[$key]['kumulatif']['sembuh'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('recovered');
                $array[$key]['kumulatif']['meninggal'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('death');
                $array[$key]['kumulatif']['selesai_ODP'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('finished_ODP');
                $array[$key]['kumulatif']['selesai_PDP'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('finished_PDP');
                $array[$key]['aktif']['ODP'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('new_ODP') - (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('finished_ODP');
                $array[$key]['aktif']['PDP'] = (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('new_PDP') - (int) $local->where('district_id', $no)->whereBetween('day', [1, $st['hari_ke']])->sum('finished_PDP');

                if (!isset($array[$key]['kasus_baru'])) {
                    $array[$key]['kasus_baru']['ODP'] = 0;
                    $array[$key]['kasus_baru']['positif'] = 0;
                    $array[$key]['kasus_baru']['negatif'] = 0;
                    $array[$key]['kasus_baru']['sembuh'] = 0;
                    $array[$key]['kasus_baru']['meninggal'] = 0;
                    $array[$key]['kasus_baru']['PDP'] = 0;
                }
                if (!isset($array[$key]['selesai'])) {
                    $array[$key]['selesai']['ODP'] = 0;
                    $array[$key]['selesai']['PDP'] = 0;
                }
            }
        }
        for ($i = 0; $i < count($array); ++$i) {
            $weekly_positive_avg = 0;
            $weekly_recovered_avg = 0;
            $weekly_death_avg = 0;
            $weekly_ODP_avg = 0;
            $weekly_PDP_avg = 0;
            if ($i === 0) {
                $weekly_positive_avg = (float) number_format($array[$i]['kumulatif']['positif'] / 1, 2);
                $weekly_recovered_avg = (float) number_format($array[$i]['kumulatif']['sembuh'] / 1, 2);
                $weekly_death_avg = (float) number_format($array[$i]['kumulatif']['meninggal'] / 1, 2);
                $weekly_ODP_avg = (float) number_format($array[$i]['kumulatif']['ODP'] / 1, 2);
                $weekly_PDP_avg = (float) number_format($array[$i]['kumulatif']['PDP'] / 1, 2);
            } elseif ($i === 2) {
                $weekly_positive_avg = (float) number_format($array[$i]['kumulatif']['positif'] / 2, 2);
                $weekly_recovered_avg = (float) number_format($array[$i]['kumulatif']['sembuh'] / 2, 2);
                $weekly_death_avg = (float) number_format($array[$i]['kumulatif']['meninggal'] / 2, 2);
                $weekly_ODP_avg = (float) number_format($array[$i]['kumulatif']['ODP'] / 2, 2);
                $weekly_PDP_avg = (float) number_format($array[$i]['kumulatif']['PDP'] / 2, 2);
            } elseif ($i === 3) {
                $weekly_positive_avg = (float) number_format($array[$i]['kumulatif']['positif'] / 3, 2);
                $weekly_recovered_avg = (float) number_format($array[$i]['kumulatif']['sembuh'] / 3, 2);
                $weekly_death_avg = (float) number_format($array[$i]['kumulatif']['meninggal'] / 3, 2);
                $weekly_ODP_avg = (float) number_format($array[$i]['kumulatif']['ODP'] / 3, 2);
                $weekly_PDP_avg = (float) number_format($array[$i]['kumulatif']['PDP'] / 3, 2);
            } elseif ($i == 4) {
                $weekly_positive_avg = (float) number_format($array[$i]['kumulatif']['positif'] / 4, 2);
                $weekly_recovered_avg = (float) number_format($array[$i]['kumulatif']['sembuh'] / 4, 2);
                $weekly_death_avg = (float) number_format($array[$i]['kumulatif']['meninggal'] / 4, 2);
                $weekly_ODP_avg = (float) number_format($array[$i]['kumulatif']['ODP'] / 4, 2);
                $weekly_PDP_avg = (float) number_format($array[$i]['kumulatif']['PDP'] / 4, 2);
            } elseif ($i == 5) {
                $weekly_positive_avg = (float) number_format($array[$i]['kumulatif']['positif'] / 5, 2);
                $weekly_recovered_avg = (float) number_format($array[$i]['kumulatif']['sembuh'] / 5, 2);
                $weekly_death_avg = (float) number_format($array[$i]['kumulatif']['meninggal'] / 5, 2);
                $weekly_ODP_avg = (float) number_format($array[$i]['kumulatif']['ODP'] / 5, 2);
                $weekly_PDP_avg = (float) number_format($array[$i]['kumulatif']['PDP'] / 5, 2);
            } elseif ($i > 6) {
                $kumulatif_positif =
                $array[$i]['kasus_baru']['positif']
                + $array[$i - 1]['kasus_baru']['positif']
                + $array[$i - 2]['kasus_baru']['positif']
                + $array[$i - 3]['kasus_baru']['positif']
                + $array[$i - 4]['kasus_baru']['positif']
                + $array[$i - 5]['kasus_baru']['positif']
                + $array[$i - 6]['kasus_baru']['positif'];
                $kumulatif_Sembuh =
                $array[$i]['kasus_baru']['sembuh']
                + $array[$i - 1]['kasus_baru']['sembuh']
                + $array[$i - 2]['kasus_baru']['sembuh']
                + $array[$i - 3]['kasus_baru']['sembuh']
                + $array[$i - 4]['kasus_baru']['sembuh']
                + $array[$i - 5]['kasus_baru']['sembuh']
                + $array[$i - 6]['kasus_baru']['sembuh'];
                $kumulatif_meninggal =
                $array[$i]['kasus_baru']['meninggal']
                + $array[$i - 1]['kasus_baru']['meninggal']
                + $array[$i - 2]['kasus_baru']['meninggal']
                + $array[$i - 3]['kasus_baru']['meninggal']
                + $array[$i - 4]['kasus_baru']['meninggal']
                + $array[$i - 5]['kasus_baru']['meninggal']
                + $array[$i - 6]['kasus_baru']['meninggal'];
                $kumulatif_ODP =
                $array[$i]['kasus_baru']['ODP']
                + $array[$i - 1]['kasus_baru']['ODP']
                + $array[$i - 2]['kasus_baru']['ODP']
                + $array[$i - 3]['kasus_baru']['ODP']
                + $array[$i - 4]['kasus_baru']['ODP']
                + $array[$i - 5]['kasus_baru']['ODP']
                + $array[$i - 6]['kasus_baru']['ODP'];
                $kumulatif_PDP =
                $array[$i]['kasus_baru']['PDP']
                + $array[$i - 1]['kasus_baru']['PDP']
                + $array[$i - 2]['kasus_baru']['PDP']
                + $array[$i - 3]['kasus_baru']['PDP']
                + $array[$i - 4]['kasus_baru']['PDP']
                + $array[$i - 5]['kasus_baru']['PDP']
                + $array[$i - 6]['kasus_baru']['PDP'];
                $weekly_positive_avg = (float) number_format($kumulatif_positif / 7, 2);
                $weekly_recovered_avg = (float) number_format($kumulatif_Sembuh / 7, 2);
                $weekly_death_avg = (float) number_format($kumulatif_meninggal / 7, 2);
                $weekly_ODP_avg = (float) number_format($kumulatif_ODP / 7, 2);
                $weekly_PDP_avg = (float) number_format($kumulatif_PDP / 7, 2);
            }
            $array[$i][Lang::get('general.recap')][Lang::get('general.average')][Lang::get('general.positive').'_weekly'] = $weekly_positive_avg;
            $array[$i][Lang::get('general.recap')][Lang::get('general.average')][Lang::get('general.recovered').'_weekly'] = $weekly_recovered_avg;
            $array[$i][Lang::get('general.recap')][Lang::get('general.average')][Lang::get('general.death').'_weekly'] = $weekly_death_avg;
            $array[$i][Lang::get('general.recap')][Lang::get('general.average')][Lang::get('general.ODP').'_weekly'] = $weekly_ODP_avg;
            $array[$i][Lang::get('general.recap')][Lang::get('general.average')][Lang::get('general.PDP').'_weekly'] = $weekly_PDP_avg;
        }

        return response(PicoHelper::setJson($array, true, []), 200);
    }

    public function latest()
    {
        $stat = Stat::all()->last();
        $resource = new Item($stat, new StatisticTransformer());
        $data = $this->fractal->createData($resource)->toArray();

        return response(array_replace(PicoHelper::setJson([], true, []), $data), 200);
    }
}
