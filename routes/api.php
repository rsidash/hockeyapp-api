<?php

use App\Http\Controllers\Api\v1\CityController;
use App\Http\Controllers\Api\v1\CountryController;
use App\Http\Controllers\Api\v1\IceRinkController;
use App\Http\Controllers\Api\v1\ImageController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::apiResource('countries', CountryController::class);
    Route::apiResource('cities', CityController::class);
    Route::apiResource('ice-rinks', IceRinkController::class);
    Route::apiResource('images', ImageController::class)->only(['store', 'destroy']);
});
