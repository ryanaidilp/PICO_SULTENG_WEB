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

        return response(array_replace(PicoHelper::setJson([], true, []), $data), 200);
    }

    public function show($code)
    {
        $province = Province::where('kode_provinsi', $code)->first();
        if ($province != null) {
            $province = new Item($province, new ProvinceTransformer());
            $data = $this->fractal->createData($province)->toArray();

            return response(array_replace(PicoHelper::setJson([], true, []), $data), 200)
                ->header('Content-Type', 'application/json');
        } else {
            return response(PicoHelper::setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']), 404)
                ->header('Content-Type', 'application/json');
        }
    }

    public function update($code, Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $province = Province::where('kode_provinsi', $code)->first();
                if ($province === null) {
                    return response(PicoHelper::setJson([], false, ['code' => 404, 'message' => 'Province Not Found!']), 404);
                } else {
                    $update = Province::where('kode_provinsi', $code)->update(
                        [
                            'meninggal' => $request->get('meninggal'),
                            'sembuh' => $request->get('sembuh'),
                            'positif' => $request->get('positif'),
                        ]
                    );
                    if ($update) {
                        return response(PicoHelper::setJson('Data Updated Successfully!', true, []), 200)
                            ->header('Content-Type', 'application/json');
                    } else {
                        return response(PicoHelper::setJson([], false, [
                            'code' => 400,
                            'message' => 'Failed to update!',
                        ]), 400)
                            ->header('Content-Type', 'Application/json');
                    }
                }
            } else {
                return response(PicoHelper::setJson([], false, [
                    'code' => 401,
                    'message' => 'Invalid API Key, Unauthorized Access!',
                ]), 401);
            }
        } else {
            return response(PicoHelper::setJson([], false, [
                'code' => 401,
                'message' => 'Unauthorized Access!',
            ]), 401);
        }
    }

    public function store(Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $data = $this->validate($request, [
                    'kode_provinsi' => 'required|unique:provinsi',
                    'provinsi' => 'required|unique:provinsi',
                    'positif' => 'required',
                    'meninggal' => 'required',
                    'sembuh' => 'required',
                    'map_id' => '',
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]);
                Province::create($data);

                return (Province::first()->count() > 0) ?
                    response(PicoHelper::setJson(['status' => 201, 'message' => 'Province created successfully!'], true, []), 201)
                    :
                    response(PicoHelper::setJson([], false, ['code' => 400, 'message' => 'Failed to create data!']));
            } else {
                return response(PicoHelper::setJson([], false, [
                    'code' => 401,
                    'message' => 'Invalid API Key, Unauthorized Access!',
                ]), 401);
            }
        } else {
            return response(PicoHelper::setJson([], false, [
                'code' => 401,
                'message' => 'Unauthorized Access!',
            ]), 401);
        }
    }
}
