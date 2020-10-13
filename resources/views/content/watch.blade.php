@extends('layouts.master')

@section('content')
    <div class="container">

            <div class="media__container">
                <video class="video-player__regular" id={{ "vid_{$file->hash}" }} controls src="{{ asset('storage/videos/' . $file->path) }}" autoplay>
                    <source src="{{ asset('storage/videos/' . $file->path) }}" type="video/mp4">
                </video>
            </div>
            <div>
                <h1 id="media__header">{{ $file->filename }}</h1>
                <p>Views: {{ $file->views }}</p>
                <span class="tags__container">@foreach($file->tags as $tag)@if($tag->weight >= 1.02)<p><a href="{{ route('videosByTag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></p>@endif @endforeach</span>

            </div>
            @isset($related)
                <section class="gallery__container">
                    <button id="back" class="btn btn-success">Back</button>
                    @include('modules.gallery', ['files' => $related])
                    <button id="forward" class="btn btn-success">Forward</button>
                </section>
            @endisset

    </div>

    <script src="{{ asset('/static/js/viewer.js') }}"></script>
@endsection
