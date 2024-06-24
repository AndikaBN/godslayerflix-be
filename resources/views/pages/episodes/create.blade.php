@extends('layouts.app')

@section('title', 'Add New Episode')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add New Episode for {{ $anime_series->title }}</h1>
            </div>
            <div class="section-body">
                {{-- CREATE FORM CREATE --}}
                <form action="{{ route('anime_series.episodes.store', $anime_series->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group
                        @error('nomor_episode')
                        has-error
                        @enderror">
                        <label for="nomor_episode">Episode Number</label>
                        <input type="number" class="form-control" name="nomor_episode" id="nomor_episode" value="{{ old('nomor_episode') }}" required>
                        @error('nomor_episode')
                            <span class="help-block
                            @error('nomor_episode')
                                with-errors
                            @enderror">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('title')
                        has-error
                        @enderror">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
                        @error('title')
                            <span class="help-block
                            @error('title')
                                with-errors
                            @enderror">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('video')
                        has-error
                        @enderror">
                        <label for="video">Video URL</label>
                        <input type="text" class="form-control" name="video" id="video" value="{{ old('video') }}" required>
                        @error('video')
                            <span class="help-block
                            @error('video')
                                with-errors
                            @enderror">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Episode</button>
                </form>
            </div>
        </section>
    </div>
@endsection
