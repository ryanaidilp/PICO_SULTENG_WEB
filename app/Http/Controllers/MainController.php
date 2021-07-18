<?php

namespace App\Http\Controllers;

use App\Models\Test;

use Inertia\Inertia;
use App\Models\Banner;
use App\Models\Gender;
use App\Models\Regency;
use App\Models\Hospital;
use App\Models\Province;
use App\Models\Infographic;
use App\Models\NationalCase;
use App\Models\ProvinceCase;
use App\Models\NationalVaccine;
use App\Models\ProvinceVaccine;
use App\Transformers\AppSerializer;
use App\Transformers\Api\v1\RegencyTransformer;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $local = ProvinceCase::with(["national_case:id,date"])
            ->where("province_id", 72)
            ->latest("day")->first();
        $national = NationalCase::latest("day")->first();
        $hospitals = Hospital::with([
            "contacts", "contacts.contact_type"
        ])
            ->inRandomOrder()->take(3)->get();
        $infographics = Infographic::with("images")->latest()->take(10)->get();
        $vaccine = NationalVaccine::latest("day")->take(2)->get();
        $vaccine_last = $vaccine->last();
        $vaccine = $vaccine->first();
        $vaccine->first_vaccination_received_changes = $vaccine->first_vaccination_received - $vaccine_last->first_vaccination_received;
        $vaccine->first_vaccination_received_changes_rate = \calculateRate($vaccine->first_vaccination_received_changes, $vaccine->first_vaccination_received);
        $vaccine->second_vaccination_received_changes = $vaccine->second_vaccination_received - $vaccine_last->second_vaccination_received;
        $vaccine->second_vaccination_received_changes_rate = \calculateRate($vaccine->second_vaccination_received_changes, $vaccine->second_vaccination_received);
        $province_vaccine = ProvinceVaccine::where("province_id", 72)->latest("day")->take(2)->get();
        $province_vaccine_last = $province_vaccine->last();
        $province_vaccine = $province_vaccine->first();
        $province_vaccine->first_vaccination_received_changes = $province_vaccine->first_vaccination_received - $province_vaccine_last->first_vaccination_received;
        $province_vaccine->first_vaccination_received_changes_rate = \calculateRate($province_vaccine->first_vaccination_received_changes, $province_vaccine_last->first_vaccination_received);
        $province_vaccine->second_vaccination_received_changes = $province_vaccine->second_vaccination_received - $province_vaccine_last->second_vaccination_received;
        $province_vaccine->second_vaccination_received_changes_rate = \calculateRate($province_vaccine->second_vaccination_received_changes, $province_vaccine_last->second_vaccination_received);

        return Inertia::render("Home/Index", [
            "local" => $local,
            "national" => $national,
            "hospitals" => $hospitals,
            "infographics" => $infographics->map(function ($infographic) {
                return [
                    "title" => $infographic->title,
                    "route" => $infographic->source,
                    "images" => $infographic->images->map(function ($image) {
                        return $image->image_url;
                    })->toArray()
                ];
            }),
            "nationalVaccine" => $vaccine,
            "provinceVaccine" => $province_vaccine,
        ]);
    }


    public function contact()
    {

        $districts = District::with("posts")->get();
        $posts = $districts->map(function ($district) {
            return [
                "name" => $district->kabupaten,
                "address" => "Hotline Gugus Tugas COVID-19 di " . $district->kabupaten,
                "posts" => $district->posts->map(function ($post) {
                    return [
                        "name" => $post->nama,
                        "phones" => $post->phones->map(function ($phone) {
                            return $phone->phone;
                        })->toArray()
                    ];
                })->toArray()
            ];
        })->toArray();

        return Inertia::render("Contact/Index", [
            "hospitals" => Hospital::all(),
            "task_forces" => $posts
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
            "lastUpdate" => $local->created_at->translatedFormat("l, d F Y H:i:s"),
            "local" => $local,
            "national" => $national,
            "tests" => $tests["data"],
            "districts" => $districts,
            "provinces" => $provinces->map(function ($province) {
                return [
                    "provinsi" => $province->provinsi,
                    "meninggal" => $province->meninggal,
                    "sembuh" => $province->sembuh,
                    "positif" => $province->positif,
                    "persentase_kematian" => $province->rasio_kematian,
                    "dalam_perawatan" => $province->dalam_perawatan,
                    "map_id" => $province->map_id
                ];
            })->toArray(),
            "recapNational" => function () use ($nationals) {
                return $nationals["data"];
            },
            "genders" => $genders["data"]
        ]);
    }


    public function infographic()
    {
        $infographics = Infographic::with("images")->latest()->get();
        return Inertia::render("Infographic/Index", [
            "infographics" => $infographics->map(function ($infographic) {
                return [
                    "title" => $infographic->title,
                    "route" => $infographic->link,
                    "images" => $infographic->images->map(function ($image) {
                        return $image->link;
                    })
                ];
            })
        ]);
    }


    public function table()
    {
        $stat = Statistic::with("histories")->get();
        $data = fractal($stat, new StatisticTransformer)->toArray();
        $data = array_replace(setJson([], true, []), $data);
        return Inertia::render("Table/Index", [
            "statistics" => function () use ($data) {
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
