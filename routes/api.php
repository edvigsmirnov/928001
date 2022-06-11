<?php

use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth_api')->group(function () {
    Route::get('music', [MusicController::class, 'index']);
    Route::get('music/{user}', [MusicController::class, 'show']);
    Route::put('music/{music}', [MusicController::class, 'update']);
    Route::delete('music/{music}', [MusicController::class, 'destroy']);
});


