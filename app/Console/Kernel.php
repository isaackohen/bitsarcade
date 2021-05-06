<?php

namespace App\Console;

use App\Console\Commands\ProcessTRXPayments;
use App\Console\Commands\Quiz;
use App\Console\Commands\Rain;
use App\Console\Commands\Racepayout;
use App\Console\Commands\PremiumRain;
use App\Console\Commands\ResetWeeklyBonus;
use App\Console\Commands\SendVipPromocode;
use App\Console\Commands\SendVkPromocode;
use App\Console\Commands\ValidateThatCrashIsRunning;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        //$schedule->command(SendVkPromocode::class)->hourlyAt(41);
        //$schedule->command(SendVipPromocode::class)->hourlyAt(6);
        $schedule->command(ResetWeeklyBonus::class)->hourlyAt(02);
        //$schedule->command(ResetWeeklyBonus::class)->daily();
        //$schedule->command(Racepayout::class)->daily();
        //$schedule->command(PremiumRain::class)->twiceDaily(1, 13);
        //$schedule->command(Rain::class)->hourlyAt(2);
        //$schedule->command(Rain::class)->hourlyAt(17);
        //$schedule->command(Rain::class)->hourlyAt(24);
        //$schedule->command(Rain::class)->hourlyAt(51);

        //$schedule->command(Rain::class)->everyFifteenMinutes();
        //$schedule->command(ProcessTRXPayments::class)->everyMinute();

        $expression = Cache::get('schedule:expressions:rain');
        if (!$expression) {
            $randomMinute = mt_rand(0, 59);

            $hourRange = range(1, 23);
            shuffle($hourRange);
            $randomHours = array_slice($hourRange, 0, mt_rand(5, 15));

            $expression = $randomMinute.' '.implode(',', $randomHours).' * * *';
            Cache::put('schedule:expressions:rain', $expression, Carbon::now()->endOfDay());
        }
        //$schedule->command(Rain::class)->cron($expression);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands() {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }

}
