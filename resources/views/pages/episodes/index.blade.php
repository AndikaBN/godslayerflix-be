@extends('layouts.app')

@section('title', 'Episodes')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Episodes for {{ $anime_series->title }}</h1>
                <div class="section-header-button">
                    <a href="{{ route('anime_series.episodes.create', $anime_series->id) }}" class="btn btn-primary">Add New Episode</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Episode Number</th>
                                <th>Title</th>
                                <th>Video URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($episodes as $episode)
                                <tr>
                                    <td>{{ $episode->nomor_episode }}</td>
                                    <td>{{ $episode->title }}</td>
                                    <td><a href="{{ $episode->video }}" target="_blank">{{ $episode->video }}</a></td>
                                    <td>
                                        <a href="{{ route('anime_series.episodes.edit', ['anime_series' => $anime_series->id, 'episode' => $episode->id]) }}">Edit</a>


                                        <form action="{{ route('anime_series.episodes.destroy', [$anime_series->id, $episode->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <a href="{{ route('anime_series.episodes.show', [$anime_series->id, $episode->id]) }}" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $episodes->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
