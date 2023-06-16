<?php

use App\Http\Controllers\Backend\SettingController;

Route::group(['prefix' => 'setting', 'as' => 'setting.'], function() {
    Route::get('index', [SettingController::class, 'index'])->name('index');
    Route::patch('update', [SettingController::class, 'update'])->name('update');
});
