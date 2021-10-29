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
    <div class="row justify-content-center mt-4">

    </div>
</div>
<script src="{{ asset('/static/js/text-editor.js') }}"></script>

@endsection
