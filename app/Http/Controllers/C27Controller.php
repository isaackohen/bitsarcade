<?php

namespace App\Http\Controllers;

use App\Currency\Currency;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use outcomebet\casino25\api\client\Client;

class C27Controller extends Controller
{
    /** @var Client */
    protected $client;

    /**
     * C27Controller constructor.
     * @throws \outcomebet\casino25\api\client\Exception
     */
    public function __construct()
    {
        $this->client = new Client(array(
            'url' => 'https://api.c27.games/v1/',
            'sslKeyPath' => env('c27_path'),
        ));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function seamless(Request $request)
    {
        $content = json_decode($request->getContent());

        //Log::critical($content->method);
        //die;
        if ($content->method === 'getBalance') {
            return $this->getBalance($request);
        } elseif ($content->method === 'withdrawAndDeposit') {
            return $this->withdrawAndDeposit($request);
        } elseif ($content->method === 'rollbackTransaction') {
            return response()->json([
                'result' => (json_decode ("{}")),
                'id' => $content->id,
                'jsonrpc' => '2.0'
            ]);
        } else {
            return response()->json([
                'result' => (json_decode ("{}")),
                'id' => $content->id,
                'jsonrpc' => '2.0'
            ]);
        }
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function game($slug)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/');
        }


        if($user->freegames > 1 && $slug == 'starburst_touch') {

       if(auth()->user()->access == 'moderator') {
            $this->client->setPlayer(['Id' => $user->id . '-' . auth()->user()->clientCurrency()->id() . '-bitsarcadestreamer' , 'BankGroupId' => 'bits_streamers']);
            $this->client->setBonus([   
                    'Id' => 'shared',   
                    'FsType' => 'original', 
                    'CounterType' => 'shared',  
                    'SharedParams' => [ 
                        'Games' => [    
                            $slug => [  
                                'FsCount' => auth()->user()->freegames, 
                            ]   
                        ]   
                    ]   
                ]);      
             $game = $this->client->createSession(   
                [   
                    'GameId' => $slug,  
                    'BonusId' => 'shared',  
                    'StaticHost' => 'static.bets.sh',
                    'PlayerId' => $user->id . '-' . auth()->user()->clientCurrency()->id() . '-bitsarcadestreamer',  
                    'AlternativeId' => time() . '_' . $user->id . '_' . auth()->user()->clientCurrency()->id(), 
                    'Params' => [   
                        'freeround_bet' => 1    
                    ],  
                    'RestorePolicy' => 'Create'
                ]   
             );  
             }

        else {
             $this->client->setPlayer(['Id' => $user->id . '-' . auth()->user()->clientCurrency()->id() . '-bitsarcadeplayer' , 'BankGroupId' => 'bits_usd']);
        $this->client->setBonus([   
                    'Id' => 'shared',   
                    'FsType' => 'original', 
                    'StaticHost' => 'static.bets.sh',
                    'CounterType' => 'shared',  
                    'SharedParams' => [ 
                        'Games' => [    
                            $slug => [  
                                'FsCount' => auth()->user()->freegames, 
                            ]   
                        ]   
                    ]   
                ]);      
         $game = $this->client->createSession(   
                [   
                    'GameId' => $slug,  
                    'BonusId' => 'shared',  
                    'PlayerId' => $user->id . '-' . auth()->user()->clientCurrency()->id() . '-bitsarcadeplayer',  
                    'AlternativeId' => time() . '_' . $user->id . '_' . auth()->user()->clientCurrency()->id(), 
                    'Params' => [   
                        'freeround_bet' => 1    
                    ],  
                    'RestorePolicy' => 'Create'
                ]   
            );  
        }
        }
        else
        {
       if(auth()->user()->access == 'moderator') {
            $this->client->setPlayer(['Id' => $user->id . '-' . auth()->user()->clientCurrency()->id() . '-bitsarcadestreamer' , 'BankGroupId' => 'bits_streamers']);
            $game = $this->client->createSession(
                [
                    'GameId' => $slug,
                    'PlayerId' => $user->id . '-' . auth()->user()->clientCurrency()->id() . '-bitsarcadestreamer',
                    'AlternativeId' => time() . '_' . $user->id . '_' . auth()->user()->clientCurrency()->id(),
                    'RestorePolicy' => 'Last'
                ]
            );
             }

            else {
                $this->client->setPlayer(['Id' => $user->id . '-' . auth()->user()->clientCurrency()->id() . '-bitsarcadeplayer' , 'BankGroupId' => 'bits_usd']);
                $game = $this->client->createSession(
                [
                    'GameId' => $slug,
                    'StaticHost' => 'static.bets.sh',
                    'PlayerId' => $user->id . '-' . auth()->user()->clientCurrency()->id() . '-bitsarcadeplayer',
                    'AlternativeId' => time() . '_' . $user->id . '_' . auth()->user()->clientCurrency()->id(),
                    'RestorePolicy' => 'Last'
                ]
            );
        }
        }

        sleep(1.10);

        $url = $game['SessionUrl'] . '?SessionId=' . $game['SessionId'];
        $view = view('c27')->with('data', $game)->with('url', $url);
        return view('layouts.app')->with('page', $view);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function withdrawAndDeposit(Request $request)
    {
        $content = json_decode($request->getContent());

        $sessionAlternativeId = $content->params->sessionAlternativeId;
        $currency = explode('_', $sessionAlternativeId);
        $currency = $currency[2];
        $playerName = explode('-', $content->params->playerName);

        $user = $this->getUser($playerName[0]);

        if(\App\Statistics::where('_id', $user->id)->first() == null) {
            $a = \App\Statistics::create([
                '_id' => $user->id, 'bets_btc' => 0, 'wins_btc' => 0, 'loss_btc' => 0, 'wagered_btc' => 0, 'profit_btc' => 0, 'bets_eth' => 0, 'wins_eth' => 0, 'loss_eth' => 0, 'wagered_eth' => 0, 'profit_eth' => 0, 'bets_ltc' => 0, 'wins_ltc' => 0, 'loss_ltc' => 0, 'wagered_ltc' => 0, 'profit_ltc' => 0, 'bets_doge' => 0, 'wins_doge' => 0, 'loss_doge' => 0, 'wagered_doge' => 0, 'profit_doge' => 0, 'bets_bch' => 0, 'wins_bch' => 0, 'loss_bch' => 0, 'wagered_bch' => 0, 'profit_bch' => 0, 'bets_trx' => 0, 'wins_trx' => 0, 'loss_trx' => 0, 'wagered_trx' => 0, 'profit_trx' => 0
            ]);
        }

        $stats = \App\Statistics::where('_id', $user->id)->first();

        $balance = $user->balance(Currency::find($currency))->get();

    
        if ($user->freegames > 0) {   
            if (($user->freegames - $content->params->chargeFreerounds) > 0) {  
                $user->freegames = $user->freegames - $content->params->chargeFreerounds;   
                $user->freegames_balance = $user->freegames_balance + $content->params->deposit;    
                $user->save();  
                return response()->json([   
                    'result' => [   
                        'newBalance' => (int) ($user->freegames_balance),   
                        'transactionId' => $content->params->transactionRef,    
                        'freeroundsLeft' => $user->freegames    
                    ],  
                    'id' => $content->id,   
                    'jsonrpc' => '2.0'  
                ]);
                } else {    
                $content->params->deposit = $user->freegames_balance;   
                $user->freegames = 0;   
                $user->freegames_balance = 0;   
                $user->save();  
            }   
        } else if ($user->freegames_balance > 0) {  
            $content->params->deposit = $user->freegames_balance;   
            $user->freegames_balance = 0;   
            $user->save();  
        }


        if ($currency == 'BTC' || $currency == 'btc') {
            $balanceB = (int) ((((string) $balance) * \App\Http\Controllers\Api\WalletController::rateDollarBtc()) * 100);
        } elseif ($currency == 'doge' || $currency == "DOGE") {
            $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarDoge()) * 100);
        } elseif ($currency == 'trx' || $currency == 'TRX') {
            $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarTron()) * 100);
        } elseif ($currency == 'ltc' || $currency == 'LTC') {
            $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarLtc()) * 100);
        } elseif ($currency == 'bch' || $currency == 'BCH') {
            $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarBtcCash()) * 100);
        } elseif ($currency == 'eth' || $currency == 'ETH') {
            $balanceB = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarEth()) * 100);
        }

        if ($currency == 'btc') {
            $subtract = bcdiv($content->params->withdraw, \App\Http\Controllers\Api\WalletController::rateDollarBtc() * 100, 8);
            $add = bcdiv($content->params->deposit, \App\Http\Controllers\Api\WalletController::rateDollarBtc() * 100, 8);

        } elseif ($currency == 'doge' || $currency == "DOGE") {
            $subtract = bcdiv($content->params->withdraw, \App\Http\Controllers\Api\WalletController::rateDollarDoge() * 100, 8);
            $add = bcdiv($content->params->deposit, \App\Http\Controllers\Api\WalletController::rateDollarDoge() * 100, 8);
        } elseif ($currency == 'trx' || $currency == 'TRX') {
            $subtract = bcdiv($content->params->withdraw, \App\Http\Controllers\Api\WalletController::rateDollarTron() * 100, 8);
            $add = bcdiv($content->params->deposit, \App\Http\Controllers\Api\WalletController::rateDollarTron() * 100, 8);
        } elseif ($currency == 'ltc' || $currency == 'LTC') {
            $subtract = bcdiv($content->params->withdraw, \App\Http\Controllers\Api\WalletController::rateDollarLtc() * 100, 8);
            $add = bcdiv($content->params->deposit, \App\Http\Controllers\Api\WalletController::rateDollarLtc() * 100, 8);
        } elseif ($currency == 'bch' || $currency == 'BCH') {
            $subtract = bcdiv($content->params->withdraw, \App\Http\Controllers\Api\WalletController::rateDollarBtcCash() * 100, 8);
            $add = bcdiv($content->params->deposit, \App\Http\Controllers\Api\WalletController::rateDollarBtcCash() * 100, 8);
        } elseif ($currency == 'eth' || $currency == 'ETH') {
            $subtract = bcdiv($content->params->withdraw, \App\Http\Controllers\Api\WalletController::rateDollarEth() * 100, 8);
            $add = bcdiv($content->params->deposit, \App\Http\Controllers\Api\WalletController::rateDollarEth() * 100, 8);
        }


        if($user->freegames < 1) {
            $user->balance(Currency::find($currency))->subtract($subtract, json_decode($request->getContent(), true));
        }
            $user->balance(Currency::find($currency))->add($add, json_decode($request->getContent(), true));

        $balance = $user->balance(Currency::find($currency))->get();
        if ($currency == 'BTC' || $currency == 'btc') {
            $balance = (int) ((((string) $balance) * \App\Http\Controllers\Api\WalletController::rateDollarBtc()) * 100);
        } elseif ($currency == 'doge' || $currency == "DOGE") {
            $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarDoge()) * 100);
        } elseif ($currency == 'trx' || $currency == 'TRX') {
            $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarTron()) * 100);
        } elseif ($currency == 'ltc' || $currency == 'LTC') {
            $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarLtc()) * 100);
        } elseif ($currency == 'bch' || $currency == 'BCH') {
            $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarBtcCash()) * 100);
        } elseif ($currency == 'eth' || $currency == 'ETH') {
            $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarEth()) * 100);
        }

        if ($add > 0) {
            $status = 'win';
        } else {
            $status = 'loss';
        }

        if ($subtract != 0) {
            $multi = (float) number_format(($add / $subtract), 2);
        } else {
            $multi = 0;
        }

        $profit = (float) $add - $subtract;

        if ((Currency::find($currency)->option('weekly_bonus_min_bet') ?? 0) <= $subtract) {
            if ($user->vipLevel() > 0 && ($user->weekly_bonus ?? 0) < 100) {
                $user->update([
                    'weekly_bonus' => ($user->weekly_bonus ?? 0) + 0.1
                ]);
            }
        }

        if($currency == 'doge'){
            $stats->update([
                'bets_doge' => $stats->bets_doge + 1,
                'wins_doge' => $stats->wins_doge + ($profit > 0 ? ($multi < 1 ? 0 : 1) : 0),
                'loss_doge' => $stats->loss_doge + ($profit > 0 ? ($multi < 1 ? 1 : 0) : 1),
                'wagered_doge' => $stats->wagered_doge + $subtract,
                'profit_doge' => $stats->profit_doge + ($profit > 0 ? ($multi < 1 ? -($subtract) : ($profit)) : -($subtract))
            ]);
        }

        if($currency == 'btc'){
            $stats->update([
                'bets_btc' => $stats->bets_btc + 1,
                'wins_btc' => $stats->wins_btc + ($profit > 0 ? ($multi < 1 ? 0 : 1) : 0),
                'loss_btc' => $stats->loss_btc + ($profit > 0 ? ($multi < 1 ? 1 : 0) : 1),
                'wagered_btc' => $stats->wagered_btc + $subtract,
                'profit_btc' => $stats->profit_btc + ($profit > 0 ? ($multi < 1 ? -($subtract) : ($profit)) : -($subtract))
            ]);
        }

        if($currency == 'eth'){
            $stats->update([
                'bets_eth' => $stats->bets_eth + 1,
                'wins_eth' => $stats->wins_eth + ($profit > 0 ? ($multi < 1 ? 0 : 1) : 0),
                'loss_eth' => $stats->loss_eth + ($profit > 0 ? ($multi < 1 ? 1 : 0) : 1),
                'wagered_eth' => $stats->wagered_eth + $subtract,
                'profit_eth' => $stats->profit_eth + ($profit > 0 ? ($multi < 1 ? -($subtract) : ($profit)) : -($subtract))
            ]);
        }

        if($currency == 'ltc'){
            $stats->update([
                'bets_ltc' => $stats->bets_ltc + 1,
                'wins_ltc' => $stats->wins_ltc + ($profit > 0 ? ($multi < 1 ? 0 : 1) : 0),
                'loss_ltc' => $stats->loss_ltc + ($profit > 0 ? ($multi < 1 ? 1 : 0) : 1),
                'wagered_ltc' => $stats->wagered_ltc + $subtract,
                'profit_ltc' => $stats->profit_ltc + ($profit > 0 ? ($multi < 1 ? -($subtract) : ($profit)) : -($subtract))
            ]);
        }

        if($currency == 'bch'){
            $stats->update([
                'bets_bch' => $stats->bets_bch + 1,
                'wins_bch' => $stats->wins_bch + ($profit > 0 ? ($multi < 1 ? 0 : 1) : 0),
                'loss_bch' => $stats->loss_bch + ($profit > 0 ? ($multi < 1 ? 1 : 0) : 1),
                'wagered_bch' => $stats->wagered_bch + $subtract,
                'profit_bch' => $stats->profit_bch + ($profit > 0 ? ($multi < 1 ? -($subtract) : ($profit)) : -($subtract))
            ]);
        }

        if($currency == 'trx'){
            $stats->update([
                'bets_trx' => $stats->bets_trx + 1,
                'wins_trx' => $stats->wins_trx + ($profit > 0 ? ($multi < 1 ? 0 : 1) : 0),
                'loss_trx' => $stats->loss_trx + ($profit > 0 ? ($multi < 1 ? 1 : 0) : 1),
                'wagered_trx' => $stats->wagered_trx + $subtract,
                'profit_trx' => $stats->profit_trx + ($profit > 0 ? ($multi < 1 ? -($subtract) : ($profit)) : -($subtract))
            ]);
        }

        $game = \App\Game::create([
            'id' => DB::table('games')->count() + 1,
            'user' => $user->id,
            'game' => 'slotmachine',
            'wager' => (float) $subtract,
            'multiplier' => $multi,
            'status' => $status,
            'profit' => $profit,
            'server_seed' => $content->params->transactionRef,
            'client_seed' => $content->params->transactionRef,
            'nonce' => '',
            'data' => json_decode($request->getContent(), true),
            'type' => 'quick',
            'balance-before' => number_format($balanceB/100, 2, '.', ''),
            'balance-after' => number_format($balance/100, 2, '.', ''),
            'currency' => strtolower($currency)
        ]);
        event(new \App\Events\LiveFeedGame($game, 10));

        if ($user != null && $user->referral != null) {
            $referrer = \App\User::where('_id', $user->referral)->first();
            $referrer->balance(Currency::find($currency))->add($subtract * 0.0009, \App\Transaction::builder()->message('referral bonus')->get());
        }


        return response()->json([
            'result' => [
                'newBalance' => $balance,
                'transactionId' => $content->params->transactionRef,
            ],
            'id' => $content->id,
            'jsonrpc' => '2.0'
        ]);
    }

    public function getBalance(Request $request)
    {
        sleep(0.1);
        try {
            $content = json_decode($request->getContent());

            $sessionAlternativeId = $content->params->sessionAlternativeId;

            $currency = explode('_', $sessionAlternativeId);
            $currency = $currency[2];


            $playerName = explode('-', $content->params->playerName);

            $user = $this->getUser(strtolower($playerName[0]));

            $balance = $user->balance(Currency::find($currency))->get();

            if ($currency == 'BTC' || $currency == 'btc') {
                $balance = (int) ((((string) $balance) * \App\Http\Controllers\Api\WalletController::rateDollarBtc()) * 100);
            } elseif ($currency == 'doge' || $currency == "DOGE") {
                $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarDoge()) * 100);
            } elseif ($currency == 'trx' || $currency == 'TRX') {
                $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarTron()) * 100);
            } elseif ($currency == 'ltc' || $currency == 'LTC') {
                $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarLtc()) * 100);
            } elseif ($currency == 'bch' || $currency == 'BCH') {
                $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarBtcCash()) * 100);
            } elseif ($currency == 'eth' || $currency == 'ETH') {
                $balance = (int)((((string)$balance) * \App\Http\Controllers\Api\WalletController::rateDollarEth()) * 100);
            }
        } catch (\Error $e) {
            $balance = 0;
        }


        $freegames = 0;

        if ($user->freegames > 0 ) {
            $freegames = $user->freegames;
            $balance = (int) $user->freegames_balance;
        }

        return response()->json([
            'result' => ([
                'balance' => $balance,
                'freeroundsLeft' => (int) $freegames
            ]),
            'id' => $content->id,
            'jsonrpc' => '2.0'
        ]);
    }

    public function getUser($playerName): User
    {
        return User::findOrFail($playerName);
    }
}
