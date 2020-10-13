@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="media__container">
                    <video class="video-player__regular" id={{ "vid_{$file->hash}" }} controls src="{{ asset('storage/videos/' . $file->path) }}" autoplay>
                        <source src="{{ asset('storage/videos/' . $file->path) }}" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="media-details__container">
                    <h1 class="media__header">{{ $file->filename }}</h1>
                    <p>Views: {{ $file->views }}</p>
                    <span class="tags__container">@foreach($file->tags as $tag)@if($tag->weight >= 1.02)<p><a href="{{ route('videosByTag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></p>@endif @endforeach</span>

                </div>
            </div>
        </div>

            @isset($related)
                <section class="gallery__container">
                    <button id="back" class="btn btn-purple">Back</button>
                    @include('modules.gallery', ['files' => $related])
                    <button id="forward" class="btn btn-purple">Forward</button>
                </section>
            @endisset

    </div>

    <script src="{{ asset('/static/js/viewer.js') }}"></script>
@endsection
