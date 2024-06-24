<?php

namespace App\Http\Controllers;

use App\Models\Video;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    //index
    public function index()
    {
        $videos = Video::paginate(10);
        return view('pages.videos.index', compact('videos'));
    }

    //create
    public function create()
    {
        return view('pages.videos.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,mov,ogg,qt|max:1048576', // max 1GB
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // max 10MB
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');
        $imagePath = $request->file('image')->store('images', 'public');

        $video = new Video();
        $video->video_path = $videoPath;
        $video->image_path = $imagePath;
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video created successfully');
    }

    //destroy
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}
