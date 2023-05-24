<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Test\OtpController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
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
