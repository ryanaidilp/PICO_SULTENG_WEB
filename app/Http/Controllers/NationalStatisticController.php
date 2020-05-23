<?php

namespace App\Http\Controllers;

use App\Helper\PicoHelper;
use App\NationalCaseHistory;
use App\Transformers\NationalStatisticTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class NationalStatisticController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function index()
    {
        $nationals = NationalCaseHistory::all();
        $resource = new Collection($nationals, new NationalStatisticTransformer());
        $data = $this->fractal->createData($resource)->toArray();

        return response(array_replace(PicoHelper::setJson([], true, []), $data), 200);
    }

    public function latest()
    {
        $national = NationalCaseHistory::all()->last();
        if ($national !== null) {
            $data = new Item($national, new NationalStatisticTransformer());
            $data = $this->fractal->createData($data)->toArray();

            return response(array_replace(PicoHelper::setJson([], true, []), $data), 200);
        } else {
            return response(PicoHelper::setJson([], false, ['code' => 404, 'message' => 'Data not found!']), 404);
        }
    }
}
