<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::middleware('auth:airlock')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user-report-views','API\UserController@index');
Route::prefix('airlock')->namespace('API')->group(function() {
    Route::post('register', 'AuthController@register');
    Route::post('token', 'AuthController@token');
});
Route::apiResource('products','API\ProductController')->middleware('auth:airlock');
Route::get('products-statistics','API\StatisticsController@statisticsPurchaseOnView');
Route::get('products-statistics-by-date','API\StatisticsController@statisticsByDate');
