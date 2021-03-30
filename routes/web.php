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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::post('users/addcash/{id}', [App\Http\Controllers\UserController::class, 'add_cash'])->name('users.addcash');
    
    Route::resource('sports', App\Http\Controllers\SportsController::class);
    Route::resource('series', App\Http\Controllers\SeriesController::class);
    Route::resource('matches', App\Http\Controllers\MatchController::class);
    Route::resource('contests', App\Http\Controllers\ContestController::class);
    Route::resource('teams', App\Http\Controllers\TeamController::class);
    Route::get('teams/teamplayers/{id}', [App\Http\Controllers\TeamController::class, 'add_team_players'])->name('teams.teamplayers');
    Route::post('teams/storeaddplayer', [App\Http\Controllers\TeamController::class, 'store_team_players'])->name('teams.storeaddplayer');
    
    Route::get('teams/fetchteamplayers/{id}', [App\Http\Controllers\TeamController::class, 'fetch_team_players'])->name('teams.fetchteamplayers');
    Route::resource('players', App\Http\Controllers\PlayersController::class);

    Route::get('matches/open/{id}', [App\Http\Controllers\MatchController::class, 'open_match'])->name('matches.open');

    Route::post('users/recordtransaction/{id}', [App\Http\Controllers\UserController::class, 'save_transaction'])->name('users.recordtransaction');
        
    // Get Route For Show Payment Form
    //Route::get('paywithrazorpay', [App\Http\Controllers\RazorpayController::class, 'payWithRazorpay'])->name('paywithrazorpay');

    // Post Route For Make Payment Request
    //Route::post('payment', [App\Http\Controllers\RazorpayController::class, 'payment'])->name('payment');
});

Route::group(['prefix' => 'fsa', 'middleware' => ['auth']], function() {
    //Route::get('/', App\Http\Controllers\FSAController::class);
});