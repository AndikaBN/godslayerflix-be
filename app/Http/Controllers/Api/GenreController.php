<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //get all genres
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            'status' => 'success',
            'data' => $genres
        ], 200);
    }

    //store genre
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $genre = Genre::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $genre
        ], 201);
    }

    //update genre
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre not found'
            ], 404);
        }

        $genre->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $genre
        ], 200);
    }

    //delete genre
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre not found'
            ], 404);
        }

        $genre->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Genre deleted'
        ], 200);
    }
}
