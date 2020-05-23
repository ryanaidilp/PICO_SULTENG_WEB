<?php

namespace App\Http\Controllers;

use App\District;
use App\Helper\PicoHelper;

class PostsController extends Controller
{
    public function index()
    {
        if (District::all()->count() > 0) {
            $kabupaten = District::all();
            $data = array();
            foreach ($kabupaten as $key => $dis) {
                $data[$key]['no'] = $dis->no;
                $data[$key]['nama'] = $dis->kabupaten;
                $data[$key]['posko'] = array();
                foreach ($dis->posts as $index => $pos) {
                    $data[$key]['posko'][$index]['no'] = $index + 1;
                    $data[$key]['posko'][$index]['nama'] = $pos->nama;
                    foreach ($pos->phones as $idx => $phone) {
                        $data[$key]['posko'][$index]['no_hp'][$idx] = $phone->phone;
                    }
                }
            }

            return response(PicoHelper::setJson($data, true, []), 200)
                ->header('Content-Type', 'application/json');
        } else {
            return response(PicoHelper::setJson(['Posts data is still empty!'], true, []), 200);
        }
    }
}
