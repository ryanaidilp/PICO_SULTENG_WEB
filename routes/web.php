<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [MainController::class, "index"])->name("home");
Route::get("/kontak", [MainController::class, "contact"])->name("contact");
Route::get("/wiki", [MainController::class, "wiki"])->name("wiki");
Route::get("/data", [MainController::class, "data"])->name("data");
Route::get("/infografis", [MainController::class, "infographic"])->name("infographic");
Route::get("/tabel-data", [MainController::class, "table"])->name("table");


Route::group(["prefix" => "admin"], function () {
    Voyager::routes();
});
