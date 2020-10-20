@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('content.post')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('content.write')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('modules.results')
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        @include('modules.gallery')
        <div class="page-navigation__container">
            {{ $files->links() }}
        </div>
    </div>
</div>
<script src="{{ asset('/static/js/text-editor.js') }}"></script>

@endsection
