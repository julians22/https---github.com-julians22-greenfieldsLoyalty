<?php

use App\Http\Controllers\Backend\TopupController;
use App\Models\TopUp as Topup;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'topup', 'as' => 'topup.'], function() {
    Route::get('/', [TopupController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Topup Management'), route('admin.topup.index'));
        });

    Route::get('/create', [TopupController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.topup.index')
                ->push(__('Create New Topup'), route('admin.topup.create'));
        });

    Route::post('/create', [TopupController::class, 'store'])
        ->name('store');

    Route::group(['prefix' => '{topup}'], function() {
        Route::get('show', [TopupController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Topup $topup) {
                $trail->parent('admin.topup.index')
                    ->push(__('Show TopUp'), route('admin.topup.show', $topup));
            });

        Route::get('edit', [TopupController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Topup $topup) {
                $trail->parent('admin.topup.index')
                    ->push(__('Edit TopUp'), route('admin.topup.edit', $topup));
            });

        Route::get('process', function(Topup $topup){
            if ($topup->isCompleted() && $topup->isFailed()) {
                return redirect()->route('admin.topup.show', ['topup' => $topup])->withFlash('warning', 'Anda tidak dapat melakukan proses topup kepada item yang sudah di konfirmasi atau di tolak');
            }
            $topup->update(['status' => Topup::STATUS_PROCESS]);
            return redirect()->route('admin.topup.edit', ['topup' => $topup])->withFlash('success', 'Silahkan lanjutkan proses topup');
        })->name('process');

        Route::patch('/reject', [TopupController::class, 'reject'])
            ->name('update.reject');

        Route::patch('/accept', [TopupController::class, 'accept'])
            ->name('update.accept');

        Route::delete('/', [TopupController::class, 'destroy'])
            ->name('destroy');
    });
});
