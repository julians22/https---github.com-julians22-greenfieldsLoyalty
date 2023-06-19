<?php

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Backend\CustomerController;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function() {
    Route::get('/', [CustomerController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Customer Management'), route('admin.customer.index'));
        });

    Route::group(['prefix' => '{user}'], function() {
        Route::get('show', [CustomerController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, User $user) {
                $trail->parent('admin.customer.index')
                    ->push(__('Show Customer'), route('admin.customer.show', $user));
            });
    });
});
