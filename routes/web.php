<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('testen', function() {

    $user = auth()->user();


    if ($user->vipLevel() > 0 && ($user->weekly_bonus ?? 0) < 100) {
        $user->update([
            'weekly_bonus' => ($user->weekly_bonus ?? 0) + 0.1
        ]);
    }

    dd($user->weekly_bonus);
});

Route::post('partner_cashout', function() {
        $user = auth()->user();
        $currency = 'doge';
        $balanceusd = number_format(floatval("$user->referral_balance_usd"), 2);
        $dogevalue = $balanceusd / \App\Http\Controllers\Api\WalletController::rateDollarDoge();
        if($balanceusd < 3) return reject(1, 'Minimum 3 dollar before you can cashout');
        $user->balance(\App\Currency\Currency::find($currency))->add($dogevalue, \App\Transaction::builder()->message('Referral Payout')->get()); 
        $user->update([
            'referral_balance_usd' => 0
        ]);
    });

Route::get('/slots', 'C27Controller@test');
Route::get('/slots/{game}', 'C27Controller@game');

Route::group(['prefix' => '/', 'middleware' => 'throttle:360,1'], function() {

Route::get('avatar/{hash}', 'MainController@avatar')->name('avatar');
Route::get('/lang/{locale}', 'MainController@locale');
Route::get('/{page?}/{data?}', 'MainController@main');

});
