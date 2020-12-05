<?php

namespace App\Console;

use App\Console\Commands\UpdateData;
use App\Console\Commands\UpdateProvince;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        UpdateData::class,
        UpdateProvince::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('covid:update')->dailyAt('18:00');
        $schedule->command('covid:province')->dailyAt('18:00')->hourly()->between('18:00', '19:00');
        $schedule->command('cache:clear')->dailyAt('02:00');
        $schedule->command('view:clear')->dailyAt('02:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
