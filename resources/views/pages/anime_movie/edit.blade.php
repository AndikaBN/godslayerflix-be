@extends('layouts.app')

@section('title', 'Edit Anime Movie')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Anime Movie</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Anime Movie</h2>
                <div class="card">
                    <form action="{{ route('anime_movies.update', $anime_movie) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Anime Movie</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $anime_movie->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="genre_id">Genre</label>
                                <select class="form-control select2" id="genre_id" name="genre_id" required>
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}"
                                            {{ $anime_movie->genre_id == $genre->id ? 'selected' : '' }}>
                                            {{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <img src="{{ asset('storage/' . $anime_movie->image) }}" alt="Current Image"
                                    class="img-thumbnail mt-2" width="150">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $anime_movie->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control selectric" id="status" name="status" required>
                                    <option value="ongoing" {{ $anime_movie->status == 'ongoing' ? 'selected' : '' }}>
                                        Ongoing</option>
                                    <option value="completed" {{ $anime_movie->status == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                </select>
                            </div>

                            {{-- create form video upload --}}
                            <div class="form-group">
                            <label for="video">Video</label>
                                <input type="file" class="form-control" id="video" name="video">
                                <video src="{{ asset('storage/' . $anime_movie->video) }}" controls class="mt-2"
                                    width="150"></video>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
@endpush
