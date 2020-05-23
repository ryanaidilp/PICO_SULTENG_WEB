<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Helper\PicoHelper;

class DonationController extends Controller
{
    public function index()
    {
        return response(PicoHelper::setJson(Donation::all(), true, []), 200);
    }
}
