<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\SoccerPlayersController::class, 'index']);
Route::group(['prefix'=>'soccerplayer'], function(){
    Route::get('create', fn() => App\Http\Controllers\SoccerPlayersController::create());
    Route::post('store', [App\Http\Controllers\SoccerPlayersController::class, 'store']);
    Route::get('list', [App\Http\Controllers\SoccerPlayersController::class, 'listall']);
});
Route::group(['prefix'=> 'soccermatches'], function (){
    Route::get('create', fn() => App\Http\Controllers\SoccerMatchesController::create());
    Route::post('store', fn() => App\Http\Controllers\SoccerMatchesController::store());
});
Route::group(['prefix'=>'confirmations'], function(){
    Route::get('show/{id}', fn ($id) => (new App\Http\Controllers\ConfirmationsController)->show($id));
    Route::post('create', fn () => App\Http\Controllers\ConfirmationsController::create());
    Route::post('startgame', [App\Http\Controllers\ConfirmationsController::class, 'preTeams']);
    //Route::get('preteams', [App\Http\Controllers\ConfirmationsController::class, 'preTeams']);
});
Route::get('testes', function(){
    //return (new app\Models\SoccerPlayerModel)->updateGoalKeeper();
});
