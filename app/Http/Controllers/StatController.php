<?php

namespace App\Http\Controllers;

use App\District;
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
        $kab = District::where('no', $no)->get()->first();
        $resource = new Collection($stat, new StatisticTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        $array = array();
        foreach ($data['data'] as $key => $st) {
            foreach ($localcase as $local) {
                $array[$key][Lang::get('general.day')] = $st['hari_ke'];
                $array[$key][Lang::get('general.date')] = $st['tanggal'];
                if ($st['hari_ke'] == $local->day) {
                    $array[$key]['kasus_baru']['ODP'] = $local->new_ODP;
                    $array[$key]['kasus_baru']['positif'] = $local->positive;
                    $array[$key]['kasus_baru']['negatif'] = $local->negative;
                    $array[$key]['kasus_baru']['sembuh'] = $local->recovered;
                    $array[$key]['kasus_baru']['meninggal'] = $local->death;
                    $array[$key]['kasus_baru']['PDP'] = $local->new_PDP;
                    $array[$key]['selesai']['ODP'] = $local->finished_ODP;
                    $array[$key]['selesai']['PDP'] = $local->finished_PDP;
                }
                $array[$key]['kumulatif']['ODP'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('new_ODP');
                $array[$key]['kumulatif']['PDP'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('new_PDP');
                $array[$key]['kumulatif']['positif'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('positive');
                $array[$key]['kumulatif']['negatif'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('negative');
                $array[$key]['kumulatif']['sembuh'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('recovered');
                $array[$key]['kumulatif']['meninggal'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('death');
                $array[$key]['kumulatif']['selesai_ODP'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('finished_ODP');
                $array[$key]['kumulatif']['selesai_PDP'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('finished_PDP');
                $array[$key]['aktif']['ODP'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('new_ODP') - $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('finished_ODP');
                $array[$key]['aktif']['PDP'] = $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('new_PDP') - $kab->history->whereBetween('day', [1, $st['hari_ke']])->sum('finished_PDP');
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
