<?php



namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Banner;
use App\Models\Infographic;
use App\Services\RegencyService;
use App\Services\DonationService;
use App\Services\HospitalService;
use App\Services\ProvinceService;
use App\Services\TestTypeService;
use App\Services\TaskForceService;
use App\Services\InfographicService;
use App\Services\RegencyCaseService;
use App\Services\TelemedicineService;
use App\Services\VaccineLocationService;
use App\Services\ProvinceGenderCaseService;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::active()->get();
        $hospitals = (new HospitalService)->random(3, 72);
        $infographics = (new InfographicService)->take(5);

        return Inertia::render('Home/Index', [
            'banners' => $banners,
            'hospitals' => $hospitals,
            'infographics' => $infographics,
        ]);
    }

    public function vaccine()
    {
        $vaccine_locations = (new VaccineLocationService)->all(72);

        return Inertia::render('Vaccine/Index', [
            'vaccineLocations' => $vaccine_locations,
        ]);
    }

    public function selfIsolation()
    {
        $telemedicines = (new TelemedicineService)->all();
        $donations = (new DonationService)->all();

        return Inertia::render('Isolation/Index', [
            'telemedicines' => $telemedicines,
            'donations' => $donations,
        ]);
    }

    public function contact()
    {
        $task_forces = (new TaskForceService)->all(72);
        $hospitals = (new HospitalService)->all(72);

        return Inertia::render('Contact/Index', [
            'hospitals' => $hospitals,
            'taskForces' => $task_forces,
        ]);
    }

    public function wiki()
    {
        return Inertia::render('Wiki/Index');
    }

    public function data()
    {
        $regencies = (new RegencyService)->all(72);
        $provinces = (new ProvinceService)->all();
        $tests = (new TestTypeService)->all(72);
        $genders = (new ProvinceGenderCaseService)->latest(72);
        $regency_new_case = (new RegencyCaseService)->latestRegencies(72);

        return Inertia::render('Data/Index', [
            'tests' => $tests,
            'regencies' => $regencies,
            'provinces' => $provinces,
            'genders' => $genders,
            'regencyNewCase' => $regency_new_case,
        ]);
    }

    public function infographic()
    {
        $infographics = Infographic::with('images')->orderBy('id', 'desc')->get();

        return Inertia::render('Infographic/Index', [
            'infographics' => $infographics->map(function ($infographic) {
                return [
                    'title' => $infographic->title,
                    'route' => $infographic->source,
                    'images' => $infographic->images->map(function ($image) {
                        return $image->image_url;
                    }),
                ];
            }),
        ]);
    }

    public function table()
    {
        return Inertia::render('Table/Index');
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
