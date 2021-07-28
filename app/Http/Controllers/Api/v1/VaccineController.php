<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Services\NationalVaccineService;
use App\Services\ProvinceVaccineService;
use App\Http\Controllers\Api\ApiController as Controller;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $day
     * @return \Illuminate\Http\Response
     */
    public function show($day)
    {
        // code..
    }

    public function latest()
    {
        if (\request()->has("province") && isset(\request()->province)) {
            $vaccine = (new ProvinceVaccineService)->latest(\request()->province);
        } else {
            $vaccine = (new NationalVaccineService)->latest();
        }

        return $this->response($vaccine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $day)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy($day)
    {
        //
    }
}
