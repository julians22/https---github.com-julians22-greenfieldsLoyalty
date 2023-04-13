<?php

use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RedeemController;
use App\Http\Controllers\Frontend\TermsController;
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

Route::group(['middleware' => 'auth', 'as' => 'redeem.', 'prefix' => 'redeem'], function() {
    Route::get('/', [RedeemController::class, 'index'])->name('index');
});

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms');

Route::get('faq', [FaqController::class, 'index'])
    ->name('pages.faq');
