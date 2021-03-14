<?php

namespace App\Jobs;

use App\Events\CrashFinishGame;
use App\Events\CrashGameTimerStart;
use App\Games\Crash;
use App\Games\Kernel\ProvablyFair;
use App\Settings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CrashDisableBetAccepting implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        Settings::where('name', 'crash_start_timestamp')->update(['value' => strval(now()->timestamp)]);
        Settings::where('name', 'crash_can_bet')->update(['value' => 'false']);
    }

}
