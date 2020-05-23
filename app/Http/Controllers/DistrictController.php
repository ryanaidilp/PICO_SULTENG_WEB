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
            $response = response(array_replace(PicoHelper::setJson([], true, []), $data), 200)
                ->header('Content-Type', 'Application/json');
        }

        return $response;
    }

    public function store()
    {
        $data = request()->validate();
        District::create($data);
    }

    public function index()
    {
        if (District::all()->count() > 0) {
            $districts = District::all();
            $districts = new Collection($districts, new DistrictTransformer());
            $data = $this->fractal->createData($districts)->toArray();

            return response(array_replace(PicoHelper::setJson([], true, []), $data), 200)
                ->header('Content-Type', 'application/json');
        } else {
            return response(PicoHelper::setJson(['District data is still empty!'], true, []), 200);
        }
    }

    public function update($no, Request $request)
    {
        if ($request->has('API_KEY')) {
            $API_KEY = $request->get('API_KEY');
            if ($API_KEY == 'API_KEY') {
                $update = District::where('no', $no)->update(
                    [
                        'ODP' => $request->get('ODP'),
                        'PDP' => $request->get('PDP'),
                        'positif' => $request->get('positif'),
                        'sembuh' => $request->get('sembuh'),
                        'negatif' => $request->get('negatif'),
                        'selesai_pengawasan' => $request->get('selesai_pengawasan'),
                        'selesai_pemantauan' => $request->get('selesai_pemantauan'),
                        'meninggal' => $request->get('meninggal'),
                    ]
                );
                if ($update) {
                    return
                        response(PicoHelper::setJson('Data Updated Successfully!', true, []), 200)
                        ->header('Content-Type', 'application/json');
                } else {
                    return
                        response(PicoHelper::setJson(
                            [],
                            false,
                            [
                                'code' => 400,
                                'message' => 'Failed to update!',
                            ]
                        ), 400)->header('Content-Type', 'Application/json');
                }
            } else {
                return
                    response(PicoHelper::setJson(
                        [],
                        false,
                        [
                            'code' => 401,
                            'message' => 'Invalid API Key, Unauthorized Access!',
                        ]
                    ), 401);
            }
        } else {
            return
                response(PicoHelper::setJson([], false, [
                    'code' => 401,
                    'message' => 'Unauthorized Access!',
                ]), 401);
        }
    }
}
