<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/kabupaten', 'DistrictController@store')->name('district.store');
Route::get('/kabupaten', 'DistrictController@index')->name('district.index');

Route::get('/provinsi', 'ProvinceController@index')->name('province.index');

Route::get('/statistik', 'StatController@index')->name('stats.index');
Route::get('/statistik/terkini', 'StatController@latest')->name('stats.latest');
Route::get('/statistik/{no}', 'StatController@getDistrictHistory')->name('stats.district');

Route::get('/jeniskelamin', 'SexController@index')->name('sex.index');

Route::get('/nasional', 'NationalStatisticController@index')->name('national.index');
Route::get('/nasional/terkini', 'NationalStatisticController@latest')->name('national.latest');

Route::get('/donasi', 'DonationController@index')->name('donation.index');
Route::get('/infografis', 'InfographicsController@index')->name('infographics.index');

Route::get('/rumahsakit', 'HospitalController@index')->name('hospital.index');
Route::get('/posko', 'PostsController@index')->name('posts.index');

Route::get('/test', 'TestController@index')->name('test.index');
Route::get('/gender', 'GendersController@index')->name('gender.index');
