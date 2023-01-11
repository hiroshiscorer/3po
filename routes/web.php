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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/teams', 'App\Http\Controllers\HomeController@teams');
Route::get('/pilots', 'App\Http\Controllers\HomeController@pilots');
Route::get('/schedule', 'App\Http\Controllers\HomeController@schedule');
Route::get('/rules', 'App\Http\Controllers\HomeController@rules');
Route::get('/seasons', 'App\Http\Controllers\HomeController@seasons');
Route::get('/archive/{id}', 'App\Http\Controllers\HomeController@archive');
Route::get('/pilot/{pilotname}', 'App\Http\Controllers\HomeController@pilotcard');
Route::get('/card/{season}/{pilotname}', 'App\Http\Controllers\HomeController@archivecard');

Auth::routes();

Route::get('/375vonw76v4yowv74', [App\Http\Controllers\HomeController::class, 'backdoor'])->name('backdoor');
//
//Route::get('hangars', 'App\Http\Controllers\PilotController@index');
//Route::get('hangar/{pilotName}', 'App\Http\Controllers\SaleController@index');
