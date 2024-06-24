<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AnimeMovieController;
use App\Http\Controllers\AnimeSeriesController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\VideoController;
use App\Models\Video;

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
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');
    Route::resource('users', UserController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('anime_movies', AnimeMovieController::class);
    Route::resource('anime_series', AnimeSeriesController::class);
    Route::resource('anime_series.episodes', EpisodeController::class);
    Route::resource('videos', VideoController::class);
});
