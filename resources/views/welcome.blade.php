@extends('layouts.master')

@section('title', 'ThrillGifs')

@section('content')
    <h1>ThrillGIFS</h1>
    <div class="gallery__container gallery__outer-container">
        @include('modules.gallery')
    </div>
@endsection
