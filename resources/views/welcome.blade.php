@extends('layouts.master')

@section('title', 'ThrillGifs')

@section('content')
    <div class="container-fluid">
        <div class="gallery__container gallery__outer-container">
            @include('modules.gallery')
        </div>
    </div>
@endsection
