<?php

namespace App\Providers;

use App\Models\LocalCaseHistory;
use App\Models\Statistic;
use App\Observers\LocalCaseHistoryObserver;
use App\Observers\StatisticObserver;
use Illuminate\Support\ServiceProvider;

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
        LocalCaseHistory::observe(new LocalCaseHistoryObserver);
        Statistic::observe(new StatisticObserver);
    }
}
