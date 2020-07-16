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
        $stat = Stat::with('histories')->get();
        $resource = new Collection($stat, new StatisticTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        $response_data = cache()->remember('STATISTICS.ALL', now()->addMinutes(5), function () use ($data) {
            return array_replace(PicoHelper::setJson([], true, []), $data);
        });

        return response(array_replace(PicoHelper::setJson([], true, []), $response_data), 200);
    }

    public function latest()
    {
        $stat = Stat::with('histories')->get()->last();
        $resource = new Item($stat, new StatisticTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        $response_data = cache()->remember("STATISTICS.LATEST", now()->addMinutes(5), function () use ($data) {
            return array_replace(PicoHelper::setJson([], true, []), $data);
        });

        return response($response_data, 200);
    }
}
