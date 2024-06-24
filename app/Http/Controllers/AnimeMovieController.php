<?php

namespace App\Http\Controllers;

use App\Models\AnimeMovie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AnimeMovieController extends Controller
{
    //index
    public function index(){
        $anime_movies = AnimeMovie::paginate(10);
        return view('pages.anime_movie.index', compact('anime_movies'));
    }

    //create
    public function create(){
        $genres = DB::table('genres')->get();
        return view('pages.anime_movie.create', compact('genres'));
    }

    //store
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required',
        ]);

        $anime_movie = new AnimeMovie();
        $anime_movie->title = $request->title;
        $anime_movie->genre_id = $request->genre_id;
        $anime_movie->description = $request->description;
        $anime_movie->status = $request->status;
        $anime_movie->save();

        //save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/movies', $anime_movie->id . '.' . $image->getClientOriginalExtension());
            $anime_movie->image = 'storage/movies/' . $anime_movie->id . '.' . $image->getClientOriginalExtension();
            $anime_movie->save();
        }

        //save video
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video->storeAs('public/movies', $anime_movie->id . '.' . $video->getClientOriginalExtension());
            $anime_movie->video = 'storage/movies/videos/' . $anime_movie->id . '.' . $video->getClientOriginalExtension();
            $anime_movie->save();
        }

        return redirect()->route('anime_movies.index')->with('success', 'Anime Movie created successfully');
    }

    //edit
    public function edit($id){
        $anime_movie = AnimeMovie::find($id);
        if (!$anime_movie) {
            return redirect()->route('anime_movies.index')->with('error', 'Anime Movie not found');
        }
        $genres = DB::table('genres')->get();
        return view('pages.anime_movie.edit', compact('anime_movie', 'genres'));
    }

    //update
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required',
        ]);

        $anime_movie = AnimeMovie::find($id);
        if (!$anime_movie) {
            return redirect()->route('anime_movies.index')->with('error', 'Anime Movie not found');
        }

        $anime_movie->title = $request->title;
        $anime_movie->genre_id = $request->genre_id;
        $anime_movie->description = $request->description;
        $anime_movie->status = $request->status;
        $anime_movie->save();

        //save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/movies', $anime_movie->id . '.' . $image->getClientOriginalExtension());
            $anime_movie->image = 'storage/movies/' . $anime_movie->id . '.' . $image->getClientOriginalExtension();
            $anime_movie->save();
        }

        //save video
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video->storeAs('public/movies', $anime_movie->id . '.' . $video->getClientOriginalExtension());
            $anime_movie->video = 'storage/movies/videos/' . $anime_movie->id . '.' . $video->getClientOriginalExtension();
            $anime_movie->save();
        }

        return redirect()->route('anime_movies.index')->with('success', 'Anime Movie updated successfully');
    }

    //destroy
    public function destroy($id){
        $anime_movie = AnimeMovie::find($id);
        if (!$anime_movie) {
            return redirect()->route('anime_movies.index')->with('error', 'Anime Movie not found');
        }
        $anime_movie->delete();
        return redirect()->route('anime_movies.index')->with('success', 'Anime Movie deleted successfully');
    }

    //show
    public function show($id){
        $anime_movie = AnimeMovie::find($id);
        if (!$anime_movie) {
            return redirect()->route('anime_movies.index')->with('error', 'Anime Movie not found');
        }
        return view('pages.anime_movie.show', compact('anime_movie'));
    }
}
