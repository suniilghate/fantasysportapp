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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('sports', App\Http\Controllers\SportsController::class);
Route::resource('series', App\Http\Controllers\SeriesController::class);
Route::resource('matches', App\Http\Controllers\MatchController::class);
Route::resource('contests', App\Http\Controllers\ContestController::class);
Route::resource('teams', App\Http\Controllers\TeamController::class);
Route::resource('players', App\Http\Controllers\PlayersController::class);