<?php

use App\Http\Controllers\Backend\ActivityController;
use App\Models\Activity;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'activity', 'as' => 'activity.'], function() {
    Route::get('/', [ActivityController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Activity Management'), route('admin.activity.index'));
        });

    Route::get('/create', [ActivityController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.activity.index')
                ->push(__('Create New Activity'), route('admin.activity.create'));
        });

    Route::post('/create', [ActivityController::class, 'store'])
        ->name('store');

    Route::group(['prefix' => '{activity}'], function() {
        Route::get('show', [ActivityController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Activity $activity) {
                $trail->parent('admin.activity.index')
                    ->push(__('Show Activity'), route('admin.activity.show', $activity));
            });

        Route::get('edit', [ActivityController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Activity $activity) {
                $trail->parent('admin.activity.index')
                    ->push(__('Edit Activity'), route('admin.activity.edit', $activity));
            });


        Route::patch('/', [ActivityController::class, 'update'])
        ->name('update');

        Route::delete('/', [ActivityController::class, 'destroy'])
            ->name('destroy');
    });
});
