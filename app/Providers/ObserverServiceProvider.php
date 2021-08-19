<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\HospitalBed;
use App\Models\RegencyCase;
use App\Models\NationalCase;
use App\Models\ProvinceCase;
use App\Models\NationalVaccine;
use App\Models\ProvinceVaccine;
use App\Observers\HospitalBedObserver;
use App\Observers\RegencyCaseObserver;
use App\Observers\NationalCaseObserver;
use App\Observers\ProvinceCaseObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\NationalVaccineObserver;
use App\Observers\ProvinceVaccineObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        RegencyCase::observe(RegencyCaseObserver::class);
        HospitalBed::observe(HospitalBedObserver::class);
        ProvinceCase::observe(ProvinceCaseObserver::class);
        NationalCase::observe(NationalCaseObserver::class);
        ProvinceVaccine::observe(ProvinceVaccineObserver::class);
        NationalVaccine::observe(NationalVaccineObserver::class);
    }
}
