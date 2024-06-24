<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    //get all episodes by anime series id
    public function index($id)
    {
        $episodes = Episode::where('anime_series_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $episodes
        ], 200);
    }

    //get episode by id
    public function show($id)
    {
        $episode = Episode::find($id);
        if (!$episode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Episode not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $episode
        ], 200);
    }
    // store episode
    public function store(Request $request, $id)
    {
        $request->validate([
            'anime_series_id' => 'required|exists:anime_series,id',
            'nomor_episode' => 'required',
            'title' => 'required',
            'video' => 'required',
        ]);

        $episode = Episode::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $episode
        ], 200);
    }

    //update episode by series
    public function update(Request $request, $anime_series_id, $episode_id)
    {
        $request->validate([
            'anime_series_id' => 'required|exists:anime_series,id',
            'nomor_episode' => 'required',
            'title' => 'required',
            'video' => 'required',
        ]);

        $episode = Episode::where('anime_series_id', $anime_series_id)->where('id', $episode_id)->first();
        if (!$episode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Episode not found'
            ], 404);
        }

        $episode->update($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $episode
        ], 200);
    }


    //delete episode by series
    public function destroy($anime_series_id, $episode_id)
    {
        $episode = Episode::where('anime_series_id', $anime_series_id)->where('id', $episode_id)->first();
        if (!$episode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Episode not found'
            ], 404);
        }

        $episode->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Episode deleted'
        ], 200);
    }
}
