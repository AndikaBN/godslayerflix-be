@extends('layouts.app')

@section('title', 'Add Genre')

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
                <h1>Form Genre</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Genres</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Genres</h2>



                <div class="card">
                    <form action="{{ route('anime_movies.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        {{--
                            'title',
                            'genre_id',
                            'image',
                            'description',
                            'status',
                            'video',

                            create form for this fields
                        --}}
                        <div class="card-body">
                            <div class="form-group
                            ">
                                <label>Title</label>
                                <input type="text"
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    name="title">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="form-group
                            ">
                                <label>Genre</label>
                                <select name="genre_id"
                                    class="form-control @error('genre_id')
                                is-invalid
                            @enderror">
                                    <option value="">Select Genre</option>
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                                @error('genre_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group
                            ">
                                <label>Image</label>
                                <input type="file"
                                    class="form-control @error('image')
                                is-invalid
                            @enderror"
                                    name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group
                            ">
                                <label>Description</label>
                                <textarea name="description"
                                    class="form-control @error('description')
                                is-invalid
                            @enderror"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group
                            ">
                                <label>Status</label>
                                <select name="status"
                                    class="form-control @error('status')
                                is-invalid
                            @enderror">
                                    <option value="">Select Status</option>
                                    <option value="1">OnGoing</option>
                                    <option value="0">End</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group
                            ">
                                <label>Video</label>
                                <input type="file"
                                    class="form-control @error('video')
                                is-invalid
                            @enderror"
                                    name="video">
                                @error('video')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
@endpush
