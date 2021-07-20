<?php

namespace App\Services;

use App\Models\NationalCase;

class NationalCaseService
{
    public function all()
    {
        return NationalCase::all();
    }

    public function byDay($day)
    {
        return NationalCase::where("day", $day)->first();
    }

    public function latest()
    {
        return NationalCase::latest("day")->first();
    }
}
