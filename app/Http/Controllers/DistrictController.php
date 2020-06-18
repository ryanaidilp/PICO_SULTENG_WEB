<?php

namespace App\Http\Controllers;

use App\District;
use App\Transformers\DistrictTransformer;
use App\Helper\PicoHelper;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class DistrictController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function show($no)
    {
        $district = District::where('no', $no)->first();
        if ($district === null) {
            return response(PicoHelper::setJson([], false, [
                'code' => 404,
                'message' => 'District not found!',
            ]), 404);
        } else {
            $district = new Item($district, new DistrictTransformer());
            $data = $this->fractal->createData($district)->toArray();
            $response_data = cache()->remember('DISTRICT.ALL', now()->addMinutes(5), function () use ($data) {
                return array_replace(PicoHelper::setJson([], true, []), $data);
            });
            return response($response_data, 200);
        }
    }


    public function index()
    {
        if (District::all()->count() > 0) {
            $districts = District::all();
            $districts = new Collection($districts, new DistrictTransformer());
            $data = $this->fractal->createData($districts)->toArray();
            $response_data = cache()->remember('DISTRICT.SHOW', now()->addMinutes(5), function () use ($data) {
                return array_replace(PicoHelper::setJson([], true, []), $data);
            });
            return response($response_data, 200);
        } else {
            return response(PicoHelper::setJson(['District data is still empty!'], true, []), 200);
        }
    }
}
