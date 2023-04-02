<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/tool/canvas', 'App\Http\Controllers\ToolController@canvas')->name('tool.canvas');

Route::get('/goto/', 'App\Http\Controllers\HomeController@goto')->name('goto');
