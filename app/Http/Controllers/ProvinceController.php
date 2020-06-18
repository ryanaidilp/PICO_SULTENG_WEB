<?php

namespace App\Http\Controllers;

use App\Helper\PicoHelper;
use App\Province;
use App\Transformers\ProvinceTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ProvinceController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function index()
    {
        $provinces = Province::all();
        $resource = new Collection($provinces, new ProvinceTransformer());
        $data = $this->fractal->createData($resource)->toArray();
        $response_data = cache()->remember('PROVINCE.ALL', now()->addMinutes(5), function () use ($data) {
            return array_replace(PicoHelper::setJson([], true, []), $data);
        });
        return response($response_data, 200);
    }

    public function show($code)
    {
        $province = Province::where('kode_provinsi', $code)->first();
        if ($province != null) {
            $province = new Item($province, new ProvinceTransformer());
            $data = $this->fractal->createData($province)->toArray();

            $response_data = cache()->remember('PROVINCE.SHOW', now()->addMinutes(5), function () use ($data) {
                return array_replace(PicoHelper::setJson([], true, []), $data);
            });
            return response($response_data, 200);
        } else {
            return response(PicoHelper::setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']), 404)
                ->header('Content-Type', 'application/json');
        }
    }
}
