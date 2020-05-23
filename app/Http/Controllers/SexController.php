<?php

namespace App\Http\Controllers;

use App\Helper\PicoHelper;
use App\Sex;

class SexController extends Controller
{
    public function index()
    {
        $sexes = Sex::all();

        return response(PicoHelper::setJson($sexes, true, []), 200);
    }
}
