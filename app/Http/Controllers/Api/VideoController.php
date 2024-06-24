<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //get all videos
    public function index()
    {
        $videos = Video::all();
        return response()->json([
            'status' => 'success',
            'data' => $videos
        ]);
    }

    //get video by id
    public function show($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return response()->json([
                'status' => 'error',
                'message' => 'Video not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $video
        ]);
    }

    //show video
    public function showVideo($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return response()->json([
                'status' => 'error',
                'message' => 'Video not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $video
        ]);
    }
}
