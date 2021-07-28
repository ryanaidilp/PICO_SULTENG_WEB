<?php

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

Route::middleware("auth:api")->get("/user", function (Request $request) {
    return $request->user();
});


Route::prefix("v1")->group(function () {
    Route::prefix("statistics")->group(function () {
        Route::get("/", [App\Http\Controllers\Api\v1\StatisticController::class, "index"]);
        Route::get("/latest", [App\Http\Controllers\Api\v1\StatisticController::class, "latest"]);
        Route::get("/{day}", [App\Http\Controllers\Api\v1\StatisticController::class, "show"]);
    });
    Route::prefix("regencies")->group(function () {
        Route::get("/all/{province_id}", [App\Http\Controllers\Api\v1\RegencyCaseController::class, "all"]);
    });
    Route::prefix("vaccine")->group(function () {
        Route::get("/latest", [App\Http\Controllers\Api\v1\VaccineController::class, "latest"]);
    });
});
