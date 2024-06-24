@extends('layouts.app')

@section('title', 'Edit Episode')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Episode for {{ $anime_series->title }}</h1>
            </div>
            <div class="section-body">
                <form action="{{ route('anime_series.episodes.update', ['anime_series' => $anime_series->id, 'episode' => $episode->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nomor_episode">Episode Number</label>
                        <input type="number" class="form-control" name="nomor_episode" id="nomor_episode" value="{{ $episode->nomor_episode }}" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $episode->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="video">Video URL</label>
                        <input type="text" class="form-control" name="video" id="video" value="{{ $episode->video }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Episode</button>
                </form>
            </div>
        </section>
    </div>
@endsection
