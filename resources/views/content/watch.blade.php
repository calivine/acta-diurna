@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="media-container">
                <h1 id="media__header">{{ $file->filename }}</h1>
                <video id={{ "vid_{$file->hash}" }} controls width="480" src="{{ asset('storage/videos/' . $file->path) }}" autoplay loop>
                    <source src="{{ asset('storage/videos/' . $file->path) }}" type="video/mp4">
                </video>
            </div>
            <p>Views: {{ $file->views }}</p>
        </div>
    </div>
    <script src="{{ asset('/static/js/viewer.js') }}"></script>
@endsection
