<?php

use App\Http\Controllers\Backend\RewardController;
use App\Models\Reward;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'reward', 'as' => 'reward.'], function() {
    Route::get('/', [RewardController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Reward Management'), route('admin.reward.index'));
        });

    Route::get('/create', [RewardController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.reward.index')
                ->push(__('Create New Reward'), route('admin.reward.create'));
        });

    Route::post('/create', [RewardController::class, 'store'])
        ->name('store');

    Route::group(['prefix' => '{reward}'], function() {
        Route::get('show', [RewardController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Reward $reward) {
                $trail->parent('admin.reward.index')
                    ->push(__('Show Reward'), route('admin.reward.show', $reward));
            });

        Route::get('edit', [RewardController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Reward $reward) {
                $trail->parent('admin.reward.index')
                    ->push(__('Edit Reward'), route('admin.reward.edit', $reward));
            });


        Route::patch('/', [RewardController::class, 'update'])
        ->name('update');

        Route::delete('/', [RewardController::class, 'destroy'])
            ->name('destroy');
    });
});
