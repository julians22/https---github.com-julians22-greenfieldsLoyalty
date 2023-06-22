<?php

use App\Http\Controllers\Backend\FaqController;
use App\Models\Faq;
use Tabuna\Breadcrumbs\Trail;

Route::group(['prefix' => 'faq', 'as' => 'faq.'], function() {
    Route::get('/', [FaqController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Faq Management'), route('admin.faq.index'));
        });

    Route::get('/create', [FaqController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.faq.index')
                ->push(__('Create New Faq'), route('admin.faq.create'));
        });

    Route::post('/create', [FaqController::class, 'store'])
        ->name('store');

    Route::group(['prefix' => '{faq}'], function() {
        Route::get('show', [FaqController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Faq $faq) {
                $trail->parent('admin.faq.index')
                    ->push(__('Show Faq'), route('admin.faq.show', $faq));
            });

        Route::get('edit', [FaqController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Faq $faq) {
                $trail->parent('admin.faq.index')
                    ->push(__('Edit Faq'), route('admin.faq.edit', $faq));
            });


        Route::patch('/', [FaqController::class, 'update'])
        ->name('update');

        Route::delete('/', [FaqController::class, 'destroy'])
            ->name('destroy');
    });
});
