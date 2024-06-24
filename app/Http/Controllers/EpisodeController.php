<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\AnimeSeries;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    //index
    public function index($id)
    {
        $anime_series = AnimeSeries::find($id);
        $episodes = Episode::where('anime_series_id', $id)->paginate(10);
        return view('pages.episodes.index', compact('episodes', 'anime_series'));
    }

    //create
    public function create($id)
    {
        $anime_series = AnimeSeries::find($id);
        return view('pages.episodes.create', compact('anime_series'));
    }

    //store
    public function store(Request $request, $anime_series_id)
    {
        $request->validate([
            'nomor_episode' => 'required',
            'title' => 'required',
            'video' => 'required'
        ]);

        $episode = new Episode([
            'nomor_episode' => $request->get('nomor_episode'),
            'title' => $request->get('title'),
            'video' => $request->get('video'),
            'anime_series_id' => $anime_series_id
        ]);

        $episode->save();

        return redirect()->route('anime_series.episodes.index', $anime_series_id)
            ->with('success', 'Episode created successfully');
    }


    public function edit($anime_series_id, $episode_id)
    {
        $anime_series = AnimeSeries::findOrFail($anime_series_id);
        $episode = Episode::findOrFail($episode_id);


        return view('pages.episodes.edit', compact('anime_series', 'episode'));
    }

    public function update(Request $request, $anime_series_id, $episode_id)
    {
        $request->validate([
            'nomor_episode' => 'required',
            'title' => 'required',
            'video' => 'required'
        ]);

        $episode = Episode::findOrFail($episode_id);
        $episode->update($request->all());

        return redirect()->route('anime_series.episodes.index', $anime_series_id)
            ->with('success', 'Episode updated successfully');
    }

    //destroy
    // destroy
    public function destroy($anime_series_id, $episode_id)
    {
        $episode = Episode::find($episode_id);

        if (!$episode) {
            return redirect()->route('anime_series.episodes.index', $anime_series_id)
                ->with('error', 'Episode not found');
        }

        $episode->delete();

        return redirect()->route('anime_series.episodes.index', $anime_series_id)
            ->with('success', 'Episode deleted successfully');
    }


    //show
    // show
    public function show($anime_series_id, $episode_id)
    {
        $episode = Episode::find($episode_id);

        if (!$episode) {
            return redirect()->route('anime_series.episodes.index', $anime_series_id)
                ->with('error', 'Episode not found');
        }

        $anime_series = AnimeSeries::find($anime_series_id);

        if (!$anime_series) {
            return redirect()->route('anime_series.index')
                ->with('error', 'Anime Series not found');
        }

        return view('pages.episodes.show', compact('episode', 'anime_series'));
    }
}
