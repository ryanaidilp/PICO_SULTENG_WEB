<?php

namespace App\Http\Controllers;

use App\Models\District;
use Inertia\Inertia;
use App\Models\Donation;
use App\Models\Facility;
use App\Models\Gender;
use App\Models\Hospital;
use App\Models\Infographic;
use App\Models\NationalCaseHistory;
use App\Models\Province;
use App\Models\Statistic;
use App\Models\Test;
use App\Transformers\GenderTransformer;
use App\Transformers\NationalStatisticTransformer;
use App\Transformers\StatisticTransformer;
use App\Transformers\TestTransformer;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::where('status', 1)->get();
        $local = Statistic::latest()->first();
        $national = NationalCaseHistory::latest()->first();
        $districts = District::all();
        $hospitals = Hospital::inRandomOrder()->take(3)->get();
        $infographics = Infographic::with('images')->latest()->take(10)->get();
        return Inertia::render('Home/Index', [
            'donations' => $donations,
            'lastUpdate' => $local->created_at->translatedFormat('l, d F Y H:i:s'),
            'local' => $local,
            'national' => $national,
            'districts' => $districts,
            'hospitals' => $hospitals,
            'infographics' => $infographics->map(function ($infographic) {
                return [
                    'title' => $infographic->title,
                    'route' => $infographic->link,
                    'images' => $infographic->images->map(function ($image) {
                        return $image->link;
                    })->toArray()
                ];
            })
        ]);
    }


    public function contact()
    {

        $districts = District::with('posts')->get();
        $posts = $districts->map(function ($district) {
            return [
                'name' => $district->kabupaten,
                'address' => "Hotline Gugus Tugas COVID-19 di " . $district->kabupaten,
                'posts' => $district->posts->map(function ($post) {
                    return [
                        'name' => $post->nama,
                        'phones' => $post->phones->map(function ($phone) {
                            return $phone->phone;
                        })->toArray()
                    ];
                })->toArray()
            ];
        })->toArray();

        return Inertia::render('Contact/Index', [
            'hospitals' => Hospital::all(),
            'task_forces' => $posts
        ]);
    }


    public function wiki()
    {
        return Inertia::render("Wiki/Index");
    }


    public function data()
    {
        $local = Statistic::latest()->first();
        $national = NationalCaseHistory::latest()->first();
        $districts = District::all();
        $provinces = Province::all();
        $tests = fractal(Test::all(), new TestTransformer)->toArray();
        $nationals = fractal(NationalCaseHistory::all(), new NationalStatisticTransformer)->toArray();
        $genders = fractal(Gender::latest()->first(), new GenderTransformer)->toArray();
        return Inertia::render("Data/Index", [
            'lastUpdate' => $local->created_at->translatedFormat('l, d F Y H:i:s'),
            'local' => $local,
            'national' => $national,
            'tests' => $tests['data'],
            'districts' => $districts,
            'provinces' => $provinces->map(function ($province) {
                return [
                    'provinsi' => $province->provinsi,
                    'meninggal' => $province->meninggal,
                    'sembuh' => $province->sembuh,
                    'positif' => $province->positif,
                    'persentase_kematian' => $province->rasio_kematian,
                    'dalam_perawatan' => $province->dalam_perawatan,
                    'map_id' => $province->map_id
                ];
            })->toArray(),
            'recapNational' => function () use ($nationals) {
                return $nationals['data'];
            },
            'genders' => $genders['data']
        ]);
    }


    public function infographic()
    {
        $infographics = Infographic::with('images')->latest()->get();
        return Inertia::render('Infographic/Index', [
            'infographics' => $infographics->map(function ($infographic) {
                return [
                    'title' => $infographic->title,
                    'route' => $infographic->link,
                    'images' => $infographic->images->map(function ($image) {
                        return $image->link;
                    })
                ];
            })
        ]);
    }


    public function table()
    {
        $stat = Statistic::with('histories')->get();
        $data = fractal($stat, new StatisticTransformer)->toArray();
        $data = array_replace(setJson([], true, []), $data);
        return Inertia::render('Table/Index', [
            'statistics' => function () use ($data) {
                return $data;
            }
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
