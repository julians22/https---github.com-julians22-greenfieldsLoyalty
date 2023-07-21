<?php

use App\Http\Controllers\Ajax\AreaController;
use App\Http\Controllers\Ajax\PasswordValidation;
use App\Http\Controllers\Ajax\ProductController;
use App\Http\Controllers\Ajax\RedeemController as AjaxRedeemController;
use App\Http\Controllers\Frontend\ActivityController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PrivacyController;
use App\Http\Controllers\Frontend\RedeemController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\TopupController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::group(['prefix' => 'promo', 'as' => 'promo.'], function() {
    Route::get('/', [ActivityController::class, 'index'])->name('index');
});

Route::group(['middleware' => ['auth', 'user_complete_detail', config('boilerplate.access.middleware.verified')]], function() {
    Route::group(['as' => 'redeem.', 'prefix' => 'redeem'], function(){
        Route::get('/', [RedeemController::class, 'index'])->name('index');
    });


    Route::group(['prefix' => 'toptup', 'as' => 'toptup.'], function() {
        Route::post('/', [TopupController::class, 'store'])->name('store');
    });
});

// Pages routes

Route::get('term-and-condition', [TermsController::class, 'index'])
    ->name('pages.terms');

Route::get('privacy-policy', [PrivacyController::class, 'index'])
    ->name('pages.privacy');

Route::get('faq', [FaqController::class, 'index'])
    ->name('pages.faq');

// Ajax Routes

Route::get('ajax/load-province', [AreaController::class, 'getProvince']);
Route::get('ajax/load-city/{id}', [AreaController::class, 'getCity']);
Route::get('ajax/load-district/{id}', [AreaController::class, 'getDistrict']);

Route::get('ajax/load-category/{id?}', [ProductController::class, 'getCategory']);
Route::get('ajax/load-product/{id?}', [ProductController::class, 'getProducts']);

Route::post('ajax/submit-reward', [AjaxRedeemController::class, 'store'])
    ->name('ajax.redeem.store');

Route::post('ajax/password-validate', [PasswordValidation::class, 'validate_password']);
