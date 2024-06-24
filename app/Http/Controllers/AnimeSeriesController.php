<?php

namespace App\Http\Controllers;

use App\Models\AnimeSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnimeSeriesController extends Controller
{
    //index
    public function index()
    {
        $anime_series = AnimeSeries::paginate(10)->withQueryString();
        return view('pages.anime_series.index', compact('anime_series'));
    }

    //create
    public function create()
    {
        $genres = DB::table('genres')->get();
        return view('pages.anime_series.create', compact('genres'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required',
        ]);

        $anime_series = new AnimeSeries();
        $anime_series->title = $request->title;
        $anime_series->genre_id = $request->genre_id;
        $anime_series->description = $request->description;
        $anime_series->status = $request->status;
        $anime_series->save();

        // Save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->storeAs('public/series', $anime_series->id . '.' . $image->getClientOriginalExtension());
            $anime_series->image = Storage::url($path);
            $anime_series->save();
        }

        return redirect()->route('anime_series.index')->with('success', 'Anime Series created successfully');
    }

    //edit
    public function edit($id)
    {
        $anime_series = AnimeSeries::findOrFail($id);
        $genres = DB::table('genres')->get();
        return view('pages.anime_series.edit', compact('anime_series', 'genres'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required',
        ]);

        $anime_series = AnimeSeries::findOrFail($id);
        $anime_series->title = $request->title;
        $anime_series->genre_id = $request->genre_id;
        $anime_series->description = $request->description;
        $anime_series->status = $request->status;
        $anime_series->save();

        // Save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->storeAs('public/series', $anime_series->id . '.' . $image->getClientOriginalExtension());
            $anime_series->image = Storage::url($path);
            $anime_series->save();
        }

        return redirect()->route('anime_series.index')->with('success', 'Anime Series updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        $anime_series = AnimeSeries::findOrFail($id);

        // Delete image file
        if ($anime_series->image) {
            Storage::delete(str_replace('/storage', 'public', $anime_series->image));
        }

        $anime_series->delete();
        return redirect()->route('anime_series.index')->with('success', 'Anime Series deleted successfully');
    }

    //show
    public function show($id)
    {
        $anime_series = AnimeSeries::findOrFail($id);
        return view('pages.anime_series.show', compact('anime_series'));
    }
}
