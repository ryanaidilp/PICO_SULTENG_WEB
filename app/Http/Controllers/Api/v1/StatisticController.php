<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\NationalCase;
use App\Models\ProvinceCase;
use Illuminate\Http\Request;
use App\Transformers\AppSerializer;
use App\Services\NationalCaseService;
use App\Services\ProvinceCaseService;
use App\Transformers\Api\v1\NationalCaseTransformer;
use App\Transformers\Api\v1\ProvinceCaseTransformer;
use App\Http\Controllers\Api\ApiController as Controller;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->has('province') && isset(\request()->province)) {
            $cases = (new ProvinceCaseService)->all(72);
        } else {
            $cases = (new NationalCaseService)->all();
        }

        return $this->response($cases);
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
        if (\request()->has('province') && isset(\request()->province)) {
            $cases = ProvinceCase::with('national_case:id,date')->where([
                ['province_id', '=', \request()->get('province')],
                ['day', '=', $day],
            ])->first();

            $transformer = new ProvinceCaseTransformer();
        } else {
            $cases = NationalCase::where('day', $day)->first();
            $transformer = new NationalCaseTransformer();
        }

        if (! $cases) {
            return $this->responseNotFound('Statistics not found for day');
        }

        $responses = \fractal($cases, $transformer, new AppSerializer);

        return $this->response($responses);
    }

    public function latest()
    {
        if (request()->has('province') && isset(request()->province)) {
            $case = (new ProvinceCaseService)->latest(request()->get('province'));
        } else {
            $case = (new NationalCaseService)->latest();
        }

        return $this->response($case);
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
