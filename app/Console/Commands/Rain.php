<?php

namespace App\Console\Commands;

use App\Chat;
use App\Currency\Currency;
use App\Events\ChatMessage;
use App\Invoice;
use App\Settings;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Rain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'datagamble:rain';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send rain in chat';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */


    public function handle() {
        $usersLength = mt_rand(3, 7);
        $last3Hours = \Carbon\Carbon::now()->subHours(3);
        $last24Hours = \Carbon\Carbon::now();

        $all = \App\ActivityLog\ActivityLogEntry::onlineUsers()->toArray();
        if(count($all) < $usersLength) {
            $a = User::get()->toArray();
            shuffle($a);
            $all += $a;
        }

        shuffle($all);

        $dub = []; $users = [];
        foreach ($all as $list) {
            $user = User::where('_id', $list['_id'])->first();
            if($user == null || in_array($list['_id'], $dub)) continue;
            array_push($dub, $list['_id']);
            array_push($users, $user);
        }

        $users = array_slice($users, 0, $usersLength);
        $result = [];
        
        $currency = Currency::find("doge");

        foreach ($users as $user) {
            if($user->balance($currency) > '13') return;
            $user->balance($currency)->add(floatval($currency->option('rain')), Transaction::builder()->message('Rain (Global)')->get());
            array_push($result, $user->toArray());
        }

        $message = Chat::create([
            'data' => [
                'users' => $result,
                'reward' => floatval($currency->option('rain')),
                'currency' => $currency->id()
            ],
            'type' => 'rain'
        ]);

        event(new ChatMessage($message));
    }

}
