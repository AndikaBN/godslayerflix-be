<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);

Route::middleware('auth:sanctum')->post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/genres', [App\Http\Controllers\Api\GenreController::class, 'index']);

Route::middleware('auth:sanctum')->post('/genres', [App\Http\Controllers\Api\GenreController::class, 'store']);

Route::middleware('auth:sanctum')->put('/genres/{id}', [App\Http\Controllers\Api\GenreController::class, 'update']);

Route::middleware('auth:sanctum')->delete('/genres/{id}', [App\Http\Controllers\Api\GenreController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/anime_movies', [App\Http\Controllers\Api\AnimeMovieController::class, 'index']);

Route::middleware('auth:sanctum')->post('/anime_movies', [App\Http\Controllers\Api\AnimeMovieController::class, 'store']);

Route::middleware('auth:sanctum')->put('/anime_movies/{id}', [App\Http\Controllers\Api\AnimeMovieController::class, 'update']);

Route::middleware('auth:sanctum')->delete('/anime_movies/{id}', [App\Http\Controllers\Api\AnimeMovieController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/videos', [App\Http\Controllers\Api\VideoController::class, 'index']);

//api get anime series
Route::middleware('auth:sanctum')->get('/anime_series', [App\Http\Controllers\Api\AnimeSeriesController::class, 'index']);

//api get anime series by id
Route::middleware('auth:sanctum')->get('/anime_series/{id}', [App\Http\Controllers\Api\AnimeSeriesController::class, 'show']);

//api create anime series
Route::middleware('auth:sanctum')->post('/anime_series', [App\Http\Controllers\Api\AnimeSeriesController::class, 'store']);

//api update anime series
Route::middleware('auth:sanctum')->put('/anime_series/{id}', [App\Http\Controllers\Api\AnimeSeriesController::class, 'update']);

//api delete anime series
Route::middleware('auth:sanctum')->delete('/anime_series/{id}', [App\Http\Controllers\Api\AnimeSeriesController::class, 'destroy']);

//api get episodes by anime series id
Route::middleware('auth:sanctum')->get('/anime_series/{id}/episodes', [App\Http\Controllers\Api\EpisodeController::class, 'index']);

//api create episode
Route::middleware('auth:sanctum')->post('/anime_series/{id}/episodes', [App\Http\Controllers\Api\EpisodeController::class, 'store']);

//api update episode
Route::middleware('auth:sanctum')->put('/anime_series/{anime_series_id}/episodes/{episode_id}', [App\Http\Controllers\Api\EpisodeController::class, 'update']);

//api delete episode
Route::middleware('auth:sanctum')->delete('/anime_series/{anime_series_id}/episodes/{episode_id}', [App\Http\Controllers\Api\EpisodeController::class, 'destroy']);
