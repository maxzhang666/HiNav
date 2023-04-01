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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api.auth')->group(function () {
    //Route::post('menus', function () {
    //    return 1;
    //});
    Route::post('menus', 'App\Http\Controllers\Api\ApiController@menus');
    Route::post('add_site', 'App\Http\Controllers\Api\ApiController@addSite');
});
