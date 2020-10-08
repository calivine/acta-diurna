@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="media__container">
                <h1 id="media__header">{{ $file->filename }}</h1>
                <video class="video-player__large" id={{ "vid_{$file->hash}" }} controls src="{{ asset('storage/videos/' . $file->path) }}" autoplay>
                    <source src="{{ asset('storage/videos/' . $file->path) }}" type="video/mp4">
                </video>
            </div>
            <div class="row">
                <p>Views: {{ $file->views }}</p>
            </div>
        </div>
        <div class="row">
            <span class="tags__container">@foreach($file->tags as $tag)@if($tag->weight >= 3)<p><a href="{{ route('videosByTag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></p>@endif @endforeach</span>
        </div>
        <div class="row">
            <section class="gallery__container">
                @include('modules.gallery', ['files' => $related])
            </section>
        </div>
    </div>

    <script src="{{ asset('/static/js/viewer.js') }}"></script>
@endsection
