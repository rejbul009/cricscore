<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/live-matches', [ScoreController::class, 'liveMatches'])->name('live.matches');
Route::get('/match/{id}', [ScoreController::class, 'matchDetails'])->name('match.details');
Route::get('/current', [ScoreController::class, 'currentMatches'])  ->name('current.matches');

