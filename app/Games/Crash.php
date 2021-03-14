<?php namespace App\Games;

use App\Currency\Currency;
use App\Events\BalanceModification;
use App\Events\CrashGameBet;
use App\Game;
use App\Games\Kernel\Data;
use App\Games\Kernel\Extended\ContinueGame;
use App\Games\Kernel\Extended\ExtendedGame;
use App\Games\Kernel\Extended\Turn;
use App\Games\Kernel\Metadata;
use App\Games\Kernel\Module\General\Wrapper\MultiplierCanBeLimited;
use App\Games\Kernel\ProvablyFairResult;
use App\Settings;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class Crash extends ExtendedGame {

    function metadata(): Metadata {
        return new class extends Metadata {
            function id(): string {
                return 'crash';
            }

            function name(): string {
                return 'Crash';
            }

            function icon(): string {
                return 'fas fa-crash';
            }
        };
    }

    protected function acceptBet(Data $data) {
        return filter_var(Settings::where('name', 'crash_can_bet')->first()->value, FILTER_VALIDATE_BOOLEAN)
            && !in_array($data->user()->_id, json_decode(Settings::where('name', 'crash_players')->first()->value));
    }

    protected function acceptsDemo() {
        return false;
    }

    public function ignoresMultipleClientTabs() {
        return true;
    }

    public function start(\App\Game $game) {
        $players = json_decode(Settings::where('name', 'crash_players')->first()->value);
        array_push($players, $game->user);
        Settings::where('name', 'crash_players')->update([
            'value' => json_encode($players)
        ]);
        event(new CrashGameBet(User::where('_id', $game->user)->first(), $game));
    }

    public function client_seed() {
        return Settings::where('name', 'crash_client_seed')->first()->value;
    }

    public function server_seed() {
        return Settings::where('name', 'crash_server_seed')->first()->value;
    }

    public function nonce() {
        return Settings::where('name', 'crash_nonce')->first()->value;
    }

    public function multipliers(): array {
        return [
            Settings::where('name', 'crash_start_timestamp')->first()->value,
            json_decode(Settings::where('name', 'crash_history')->first()->value)
        ];
    }

    protected function handleCancellation(\App\Game $game) {
        if($game->server_seed !== Settings::where('name', 'crash_server_seed')->first()->value) return ['error' => [1, 'This Crash game is invalid']];

        $multiplier = $this->getCurrentMultiplier();
        if($multiplier >= 350) $multiplier = 1;

        $game->update([
            'status' => 'win',
            'profit' => $game->wager * $multiplier,
            'multiplier' => $multiplier
        ]);
        User::where('_id', $game->user)->first()->balance(Currency::find($game->currency))->demo($game->demo)->add($game->profit, Transaction::builder()->game('crash')->message('Crash (Take)')->game($this->metadata()->id())->get());
        event(new \App\Events\LiveFeedGame($game, 0));
        event(new \App\Events\CrashTakeBet(User::where('_id', $game->user)->first()->name));
    }

    private function getCurrentMultiplier() {
        $start_timestamp = intval($this->multipliers()[0]);
        if($start_timestamp < 0) {
            Log::warning('Start timestamp < 0');
            return 1;
        }

        $diffS = now()->timestamp - $start_timestamp;
        $timeInMilliseconds = 0;
        $simulation = 1; $suS =  0;

        while(true) {
            $simulation += 0.05 / 15 + $suS;
            $timeInMilliseconds += 2000 / 15 / 3;
            if($simulation >= 5.5) {
                $suS += 0.05 / 15;
                $timeInMilliseconds += 4000 / 15 / 3;
            }
            if($timeInMilliseconds >= ($diffS * 1000) || $simulation >= 350) {
                if($simulation >= 350) {
                    $simulation = 1;
                    Log::warning('Crash sim is higher than 350');
                }
                break;
            }
        }

        return $simulation;
    }

    public function turn(\App\Game $game, array $turnData): Turn {
        return new ContinueGame($game, []);
    }

    public function isLoss(ProvablyFairResult $result, \App\Game $game, array $turnData): bool {
        return $result->result()[0] <= 1.1; // TODO: Set it as custom value
    }

    function result(ProvablyFairResult $result): array {
        $max_multiplier = 350; $house_edge = 0.99;
        $float_point = $max_multiplier / ($result->extractFloat() * $max_multiplier) * $house_edge;
        return [floor($float_point * 100) / 100];
    }

}
