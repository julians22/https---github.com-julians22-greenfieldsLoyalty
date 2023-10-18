<?php

use App\Http\Controllers\Backend\Reports\CustomerReportController;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'report', 'as' => 'report.'], function() {
    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function() {
        Route::get('/', [CustomerReportController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Customer Reports'), route('admin.report.customer.index'));
            });
    });

});
