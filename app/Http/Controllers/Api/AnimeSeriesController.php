<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnimeSeries;
use Illuminate\Http\Request;

class AnimeSeriesController extends Controller
{
    //get all anime series
    public function index()
    {
        $anime_series = AnimeSeries::all();
        if (!$anime_series) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anime Series not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $anime_series
        ], 200);
    }

    //get anime series by id
    public function show($id)
    {
        $anime_series = AnimeSeries::find($id);
        if (!$anime_series) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anime Series not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $anime_series
        ], 200);
    }

    /*
        'title',
        'genre_id',
        'image',
        'description',
        'status',
    */

    //store anime series
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required',
            'image'=> 'required',
        ]);

        $anime_series = AnimeSeries::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $anime_series
        ], 201);
    }

    //update anime series
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required',
            'image'=> 'required',
        ]);

        $anime_series = AnimeSeries::find($id);
        if (!$anime_series) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anime Series not found'
            ], 404);
        }

        $anime_series->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $anime_series
        ], 200);
    }

    //delete anime series
    public function destroy($id)
    {
        $anime_series = AnimeSeries::find($id);
        if (!$anime_series) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anime Series not found'
            ], 404);
        }

        $anime_series->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Anime Series deleted'
        ], 200);
    }
}
