@extends('layouts.app')

@section('title', 'Episode Details')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Episode Details for {{ $anime_series->title }}</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Episode {{ $episode->nomor_episode }}: {{ $episode->title }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Episode Number:</strong> {{ $episode->nomor_episode }}</p>
                        <p><strong>Title:</strong> {{ $episode->title }}</p>
                        <p><strong>Video URL:</strong> <a href="{{ $episode->video }}" target="_blank">{{ $episode->video }}</a></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('anime_series.episodes.edit', [$anime_series->id, $episode->id]) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('anime_series.episodes.destroy', [$anime_series->id, $episode->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('anime_series.episodes.index', $anime_series->id) }}" class="btn btn-secondary">Back to Episodes</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
