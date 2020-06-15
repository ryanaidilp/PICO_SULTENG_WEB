<?php

namespace App\Http\Controllers;

use App\Helper\PicoHelper;
use App\Infographic;
use App\Transformers\InfographicTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class InfographicsController extends Controller
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function index()
    {
        $infographics = Infographic::with('images')->get()->sortByDesc('id');
        $resource = new Collection($infographics, new InfographicTransformer);
        $data = $this->fractal->createData($resource)->toArray();
        return response(array_replace(PicoHelper::setJson([], true, []), $data), 200);
    }
}
