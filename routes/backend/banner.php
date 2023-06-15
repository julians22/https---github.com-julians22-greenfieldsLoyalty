<?php

use App\Http\Controllers\Backend\BannerController;
use App\Models\Banner;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'banner', 'as' => 'banner.'], function() {
    Route::get('/', [BannerController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Banner Management'), route('admin.banner.index'));
        });

    Route::get('/create', [BannerController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.banner.index')
                ->push(__('Create New Banner'), route('admin.banner.create'));
        });

    Route::post('/create', [BannerController::class, 'store'])
        ->name('store');

    Route::group(['prefix' => '{banner}'], function() {
        Route::get('show', [BannerController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Banner $banner) {
                $trail->parent('admin.banner.index')
                    ->push(__('Show Banner'), route('admin.banner.show', $banner));
            });

        Route::get('edit', [BannerController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Banner $banner) {
                $trail->parent('admin.banner.index')
                    ->push(__('Edit Banner'), route('admin.banner.edit', $banner));
            });


        Route::patch('/', [BannerController::class, 'update'])
        ->name('update');

        Route::delete('/', [BannerController::class, 'destroy'])
            ->name('destroy');
    });
});
