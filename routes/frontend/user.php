<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\CompleteAccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use Tabuna\Breadcrumbs\Trail;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group([
    'as' => 'user.',
    'middleware' => [
        'auth',
        ]
    ], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware(['is_user', 'whatsapp_verified'])
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Dashboard'), route('frontend.user.dashboard'));
        });

    Route::get('account', [AccountController::class, 'index'])
        ->name('account')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('My Account'), route('frontend.user.account'));
        });

    Route::get('account/edit', [AccountController::class, 'edit'])
        ->name('edit-account');

    Route::get('account/completion', [AccountController::class, 'show_completion'])
        ->name('completion-account');

    Route::patch('account/completion/submit', [CompleteAccountController::class, 'submit_completion'])
        ->name('completion-account-submit');

    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
