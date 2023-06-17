<?php

use App\Http\Controllers\Backend\CustomerController;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function() {
    Route::get('/', [CustomerController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Customer Management'), route('admin.customer.index'));
        });
});
