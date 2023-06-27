<?php

use App\Http\Controllers\Backend\RedeemController;
use App\Models\Redeem;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'redeem', 'as' => 'redeem.'], function() {
    Route::get('/', [RedeemController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Redeem Management'), route('admin.redeem.index'));
        });

    Route::get('/sync', [RedeemController::class, 'bulk_sync'])
        ->name('bulk_sync')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Sync Redeems'), route('admin.redeem.bulk_sync'));
        });

    Route::post('/sync', [RedeemController::class, 'bulk_sync_store'])
        ->name('bulk_sync.store');

    Route::post('/create', [RedeemController::class, 'store'])
        ->name('store');

    Route::group(['prefix' => '{redeem}'], function() {
        Route::get('show', [RedeemController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Redeem $redeem) {
                $trail->parent('admin.redeem.index')
                    ->push(__('Show Redeem'), route('admin.redeem.show', $redeem));
            });

        Route::get('edit', [RedeemController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Redeem $redeem) {
                $trail->parent('admin.redeem.index')
                    ->push(__('Edit Redeem'), route('admin.redeem.edit', $redeem));
            });

        Route::get('process', function(Redeem $redeem){
            if ($redeem->isCompleted() && $redeem->isFailed()) {
                return redirect()->route('admin.redeem.show', ['redeem' => $redeem])->withFlash('warning', 'Anda tidak dapat melakukan proses tukar hadiah kepada item yang sudah di konfirmasi atau di tolak');
            }
            $redeem->update(['status' => Redeem::STATUS_PROCESS, 'process_at' => now()]);
            return redirect()->route('admin.redeem.edit', ['redeem' => $redeem])->withFlash('success', 'Silahkan lanjutkan proses tukar hadiah');
        })->name('process');

        Route::patch('/reject', [RedeemController::class, 'reject'])
            ->name('update.reject');

        Route::get('/accept', [RedeemController::class, 'accept'])
            ->name('update.accept');

        Route::patch('/send', [RedeemController::class, 'send'])
            ->name('update.send');

        Route::delete('/', [RedeemController::class, 'destroy'])
            ->name('destroy');
    });
});
