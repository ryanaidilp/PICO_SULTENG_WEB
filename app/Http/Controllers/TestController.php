<?php

namespace App\Http\Controllers;

use App\Helper\PicoHelper;
use App\Test;
use App\Transformers\TestTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class TestController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function index()
    {
        $tests = Test::all();
        $resource = new Collection($tests, new TestTransformer());
        $data = $this->fractal->createData($resource)->toArray();

        return response(array_replace(PicoHelper::setJson([], true, []), $data), 200);
    }
}
