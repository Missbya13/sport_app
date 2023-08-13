<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\MatchBasketballController;
use App\Http\Controllers\MessageController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/tournaments', 'App\Http\Controllers\TournamentController@index')->name('tournaments.index');


Route::get('/tournaments/create', 'App\Http\Controllers\TournamentController@create')->name('tournaments.create');

Route::post('/tournaments', 'App\Http\Controllers\TournamentController@store');
Route::get('/tournaments/{id}', 'App\Http\Controllers\TournamentController@show')->name('tournaments.show');
Route::get('/tournaments/{id}/edit', 'App\Http\Controllers\TournamentController@edit')->name('tournaments.edit');
Route::put('/tournaments/{id}', 'App\Http\Controllers\TournamentController@update')->name('tournaments.update');
Route::delete('/tournaments/{id}', 'App\Http\Controllers\TournamentController@destroy')->name('tournaments.destroy');



});

require __DIR__.'/auth.php';

// Utilisation de la même syntaxe pour toutes les routes

Route::post('/tournaments', 'App\Http\Controllers\TournamentController@store')->name('tournaments.store');
Route::post('/matches_basketball', 'MatchBasketballController@store')->name('matches_basketball.store');
Route::get('/matches_basketball/create', 'App\Http\Controllers\MatchBasketballController@create')->name('matches.basketball.create');


Route::get('/matches_football/create', 'App\Http\Controllers\MatchFootballController@create')->name('matches.football.create');
Route::post('/matches_football', 'MatchFootballController@store')->name('matches_football.store');

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage'])->name('delete.message');
Route::delete('/messages/{id}/delete-for-all', [MessageController::class, 'deleteMessageForAll'])->name('delete.message.for.all');

Route::get('/messages/{id}/edit', [MessageController::class, 'edit'])->name('edit.message');
Route::put('/messages/{id}', [MessageController::class, 'update'])->name('update.message');