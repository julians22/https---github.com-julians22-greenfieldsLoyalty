<?php

use App\Http\Controllers\Api\RedeemController;
use App\Http\Controllers\Api\RewardController;
use App\Http\Controllers\Api\TopUpController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->middleware('auth_api')->group(function () {
    Route::get('/check_user', [UserController::class, 'check_user']);
    Route::get('/check_point', [UserController::class, 'check_point']);
    Route::post('/register', [UserController::class, 'store']);

    Route::get('rewards', [RewardController::class, 'index']);


    // Topup routes
    Route::get('topups', [TopUpController::class, 'index']);
    Route::post('upload-receipt', [TopUpController::class, 'upload']);

    // Redeems routes
    Route::get('redeems', [RedeemController::class, 'index']);
});
