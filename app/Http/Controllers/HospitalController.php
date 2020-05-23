<?php

namespace App\Http\Controllers;

use App\Helper\PicoHelper;
use App\Hospital;

class HospitalController extends Controller
{
    public function index()
    {
        if (Hospital::all()->count() > 0) {
            return response(
                PicoHelper::setJson(Hospital::all(), true, []),
                200
            )
                ->header('Content-Type', 'Application/json');
        } else {
            return response(PicoHelper::setJson(['Hospital data is still empty!'], true, []), 200);
        }
    }

    public function show($no)
    {
        $hospital = Hospital::where('no', $no)->first();
        if ($hospital === null) {
            return response(
                PicoHelper::setJson($hospital, true, ['code' => 404, 'message' => 'Hospital not found!']),
                404
            );
        } else {
            return response(
                PicoHelper::setJson(Hospital::where('no', $no)->first(), true, []),
                200
            )
                ->header('Content-Type', 'Application/json');
        }
    }
}
