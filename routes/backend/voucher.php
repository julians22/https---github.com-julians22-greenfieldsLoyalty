<?php

use App\Http\Controllers\Backend\VoucherController;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'voucher', 'as' => 'voucher.'], function() {
    Route::get('/', [VoucherController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Voucher Management'), route('admin.voucher.index'));
        });

    Route::get('/upload', [VoucherController::class, 'upload'])
        ->name('upload')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.voucher.index')
                ->push(__('Create New Topup'), route('admin.voucher.upload'));
        });

    Route::post('/', [VoucherController::class, 'store'])
        ->name('store');
});
