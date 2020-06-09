<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Helper\PicoHelper;
use App\Transformers\GenderTransformers;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class GendersController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender = Gender::all()->last();
        $resource = new Item($gender, new GenderTransformers());
        $data = $this->fractal->createData($resource)->toArray();

        return response(array_replace(PicoHelper::setJson([], true, []), $data), 200);
    }
}
