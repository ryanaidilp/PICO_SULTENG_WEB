<?php

namespace App\Providers;

use App\Models\Statistic;
use App\Models\LocalCaseHistory;
use App\Models\NationalCaseHistory;
use App\Observers\StatisticObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\LocalCaseHistoryObserver;
use App\Observers\NationalCaseHistoryObserver;

class ModelEventObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Statistic::observe(new StatisticObserver);
        LocalCaseHistory::observe(new LocalCaseHistoryObserver);
        NationalCaseHistory::observe(new NationalCaseHistoryObserver);
    }
}
