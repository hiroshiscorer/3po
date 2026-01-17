<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/teams', 'App\Http\Controllers\HomeController@teams');
Route::get('/pilots', 'App\Http\Controllers\HomeController@pilots');
Route::get('/schedule', 'App\Http\Controllers\HomeController@schedule');
Route::get('/rules', 'App\Http\Controllers\HomeController@rules');
Route::get('/seasons', 'App\Http\Controllers\HomeController@seasons');
Route::get('/archive/{id}', 'App\Http\Controllers\HomeController@archive');
Route::get('/pilot/{pilotname}', 'App\Http\Controllers\HomeController@pilotcard');
Route::get('/card/{season}/{pilotname}', 'App\Http\Controllers\HomeController@archivecard');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin', 'App\Http\Controllers\Controller@admin');

    Route::get('/admin-season', 'App\Http\Controllers\SeasonController@index')->name('admin-season');
    Route::post('/admin-season-add', 'App\Http\Controllers\SeasonController@store');
    Route::post('/admin-season-edit', 'App\Http\Controllers\SeasonController@update');
    Route::post('/admin-season-delete', 'App\Http\Controllers\SeasonController@destroy');

    Route::get('/admin-division', 'App\Http\Controllers\DivisionController@index')->name('admin-division');
    Route::post('/admin-division-add', 'App\Http\Controllers\DivisionController@store');
    Route::post('/admin-division-edit', 'App\Http\Controllers\DivisionController@update');
    Route::post('/admin-division-delete', 'App\Http\Controllers\DivisionController@destroy');

    Route::get('/admin-team', 'App\Http\Controllers\TeamController@index')->name('admin-team');
    Route::post('/admin-team-add', 'App\Http\Controllers\TeamController@store');
    Route::post('/admin-team-edit', 'App\Http\Controllers\TeamController@update');
    Route::post('/admin-team-delete', 'App\Http\Controllers\TeamController@destroy');
    Route::post('/admin-team-clear', 'App\Http\Controllers\TeamController@clear');

    Route::get('/admin-matchup', 'App\Http\Controllers\MatchupController@index')->name('admin-matchup');
    Route::post('/admin-matchup-add', 'App\Http\Controllers\MatchupController@store');
    Route::post('/admin-matchup-edit', 'App\Http\Controllers\MatchupController@update');
    Route::post('/admin-matchup-delete', 'App\Http\Controllers\MatchupController@destroy');
    Route::post('/admin-matchup-clear', 'App\Http\Controllers\MatchupController@clear');

    Route::get('/admin-report', 'App\Http\Controllers\GameController@index')->name('admin-report');
    Route::post('/admin-report-add', 'App\Http\Controllers\GameController@store');

    Route::get('/admin-game-edit', 'App\Http\Controllers\GameController@edit')->name('admin-game-edit');
    Route::post('/admin-game-update', 'App\Http\Controllers\GameController@update');
    Route::post('/admin-game-delete', 'App\Http\Controllers\GameController@destroy');
    Route::post('/admin-game-clear', 'App\Http\Controllers\GameController@clear');


    Route::get('/admin-pilot', 'App\Http\Controllers\PilotController@index')->name('admin-pilot');
    Route::post('/admin-pilot-add', 'App\Http\Controllers\PilotController@store');
    Route::post('/admin-pilot-edit', 'App\Http\Controllers\PilotController@update');
    Route::post('/admin-pilot-delete', 'App\Http\Controllers\PilotController@destroy');
    Route::post('/admin-pilot-clear', 'App\Http\Controllers\PilotController@clear');
    Route::post('/admin-pilot-clear-team', 'App\Http\Controllers\PilotController@clearteam');

    Route::get('/admin-pilot-stats', 'App\Http\Controllers\PilotStatController@index')->name('admin-pilot-stats');
    Route::post('/admin-pilot-stats-add', 'App\Http\Controllers\PilotStatController@store');
    Route::post('/admin-pilot-stats-edit', 'App\Http\Controllers\PilotStatController@update');
    Route::post('/admin-pilot-stats-delete', 'App\Http\Controllers\PilotStatController@destroy');
    Route::post('/admin-pilot-stats-clear', 'App\Http\Controllers\PilotStatController@clear');

    Route::get('/get-archive', 'App\Http\Controllers\HomeController@getarchive');
    Route::get('/get-sql', 'App\Http\Controllers\HomeController@allcard');
});

Route::get('/375vonw76v4yowv74', [App\Http\Controllers\HomeController::class, 'backdoor'])->name('backdoor');
//
//Route::get('hangars', 'App\Http\Controllers\PilotController@index');
//Route::get('hangar/{pilotName}', 'App\Http\Controllers\SaleController@index');
