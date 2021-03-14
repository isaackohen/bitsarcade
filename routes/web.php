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


Route::get('/slots', 'C27Controller@test');
Route::get('/slots/{game}', 'C27Controller@game');

Route::group(['prefix' => '/', 'middleware' => 'throttle:360,1'], function() {

Route::get('avatar/{hash}', 'MainController@avatar')->name('avatar');
Route::get('/lang/{locale}', 'MainController@locale');
Route::get('/{page?}/{data?}', 'MainController@main');

});
