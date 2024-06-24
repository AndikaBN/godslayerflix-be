<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnimeMovie;
use Illuminate\Http\Request;

class AnimeMovieController extends Controller
{
    //get all anime movies
    public function index()
    {
        $anime_movies = AnimeMovie::all();
        return response()->json([
            'status' => 'success',
            'data' => $anime_movies
        ], 200);
    }

    //get anime movie by id
    public function show($id)
    {
        $anime_movie = AnimeMovie::find($id);
        if (!$anime_movie) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anime Movie not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $anime_movie
        ], 200);
    }

    //store anime movie
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required',
            'image'=> 'required',
            'video'=> 'required'
        ]);

        $anime_movie = AnimeMovie::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $anime_movie
        ], 201);
    }

    //update anime movie
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required',
            'image'=> 'required',
            'video'=> 'required'
        ]);

        $anime_movie = AnimeMovie::find($id);
        if (!$anime_movie) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anime Movie not found'
            ], 404);
        }

        $anime_movie->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $anime_movie
        ], 200);
    }

    //delete anime movie
    public function destroy($id)
    {
        $anime_movie = AnimeMovie::find($id);
        if (!$anime_movie) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anime Movie not found'
            ], 404);
        }

        $anime_movie->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Anime Movie deleted'
        ], 200);
    }
}
