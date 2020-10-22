@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @include('modules.upload')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @include('modules.results')
            </div>
        </div>
    </div>
@endsection
