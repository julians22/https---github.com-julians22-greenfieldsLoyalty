<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Test\OtpController;
use Shieldon\Firewall\Panel;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');


Route::group(['as' => 'frontend.', 'middleware' => 'firewall'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});

Route::group(['prefix' => 'test', 'as' => 'test.'], function() {
    Route::get('otp', function(){
        return view('test.otps.index');
    });

    Route::post('otp', [OtpController::class, 'send_otp']);

    Route::post('validate', [OtpController::class, 'validate_otp'])->name('validate');
});

Route::any('/firewall/panel/{path?}', function() {

    $panel = new Panel();
    $panel->csrf(['_token' => csrf_token()]);
    $panel->entry();

})->where('path', '(.*)');
