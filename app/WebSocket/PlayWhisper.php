<?php namespace App\WebSocket;

use App\Currency\Currency;
use App\Games\Kernel\Data;
use App\Games\Kernel\Game;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PlayWhisper extends WebSocketWhisper {

    public function event(): string {
        return "Play";
    }

    public function process($data): array {
        $game = Game::find($data->api_id);
        if($game == null) return reject(-3, 'Unknown API game id');
        if($game->isDisabled()) return reject(-5, 'Game is disabled');
        if($this->user != null && !$game->ignoresMultipleClientTabs() && DB::table('games')->where('game', $data->api_id)->where('user', $this->user->_id)->where('status', 'in-progress')->count() > 0) return reject(-8, 'Game already has started');

        if($this->user == null && !$data->demo) return reject(-2, 'Not authorized');
        if($this->user == null && $data->demo) return reject(-2, 'Please login to play');
        if(!$game->usesCustomWagerCalculations() && floatval($data->bet) < Currency::find($data->currency)->option('min_bet')) return reject(-1, 'Invalid wager value');
		if(!$game->usesCustomWagerCalculations() && floatval($data->bet) > Currency::find($data->currency)->option('max_bet')) return reject(-9, 'Invalid wager value');
        if($this->user != null && ($this->user->balance(Currency::find($data->currency))->demo($data->demo)->get() < floatval($data->bet))) return reject(-4, 'Not enough money');

        $currencyOld = $data->currency;
        $data = new Data($this->user, [
            'api_id' => $data->api_id,
            'bet' => $data->bet,
            'currency' => $data->currency,
            'demo' => $data->demo,
            'quick' => $data->quick,
            'data' => (array) $data->data
        ]);


        if ($this->user != null && $this->user->referral != null && $this->user->games() >= floatval(\App\Settings::where('name', 'referrer_activity_requirement')->first()->value)) {
            try {
                $referrer = \App\User::where('_id', $this->user->referral)->first();

                try {
                    $currency = $data->currency();
                } catch (\Exception $e) {
                    $currency = auth()->user()->clientCurrency();
                }

                $balance = $data->bet();
                if ($currency == 'BTC' || $currency == 'btc') {
                    $balanceB = (int) ((((string) $balance) * \App\Http\Controllers\Api\WalletController::rateDollarBtc()));
                } elseif ($currency == 'doge' || $currency == "DOGE") {
                    $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarDoge()));
                } elseif ($currency == 'trx' || $currency == 'TRX') {
                    $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarTron()));
                } elseif ($currency == 'ltc' || $currency == 'LTC') {
                    $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarLtc()));
                } elseif ($currency == 'bch' || $currency == 'BCH') {
                    $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarBtcCash()));
                } elseif ($currency == 'eth' || $currency == 'ETH') {
                    $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarEth()));
                }
                if ($this->user->access === 'moderator') {
                    $balanceC = $balanceB * $this->user->clientCurrency()->option('ref_mod');
                } else {
                    $balanceC = $balanceB * $this->user->clientCurrency()->option('ref_normal');
                }
                
                if ($referrer->referral_balance_usd === "" OR $referrer->referral_balance_usd === null) {
                    $referrer->referral_balance_usd = 0;
                }
                $referrer->referral_balance_usd = $referrer->referral_balance_usd + $balanceC;
                $referrer->save();
            } catch (\Exception $e) {
                Log::critical('CANNOT ADD REF BALANCE EXCEPTION ' . $e->getTraceAsString());
            } catch (\Error $e) {
                Log::critical('CANNOT ADD REF BALANCE ERROR ' . $e->getTraceAsString());
            } catch (\Throwable $e) {
                Log::critical('CANNOT ADD REF BALANCE THROWABLE ' . $e->getTraceAsString());
            }

        }

        if($this->user != null && $this->user->referral != null && $this->user->games() >= floatval(\App\Settings::where('name', 'referrer_activity_requirement')->first()->value)) {
            $referrer = \App\User::where('_id', $this->user->referral)->first();
            $referrals = $referrer->referral_wager_obtained ?? [];
            if(!in_array($this->user->_id, $referrals)) {
                array_push($referrals, $this->user->_id);
                $referrer->update(['referral_wager_obtained' => $referrals]);
                $referrer->balance(Currency::find('btc'))->add(floatval(Currency::find('btc')->option('referral_bonus')), \App\Transaction::builder()->message('Active referral bonus')->get());
            }
        }

        if($this->user != null && $this->user->vipLevel() > 0 && $this->user->vip_discord_notified == null) {
            $this->user->notify(new \App\Notifications\VipDiscordNotification());
            $this->user->update(['vip_discord_notified' => true]);
        }

        return $game->process($data);
    }

}
