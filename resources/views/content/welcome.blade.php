@extends('layouts.master')

@section('title', 'Nightmare Houses')

@section('content')
    <div class="container-fluid">
        <h1 class="post__title">Welcome to Nightmare Houses.<br><br>America’s most notorious real estate.</h1>
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ url('/highfields') }}">
                    @include('modules.figure', ['imgSource' => '1', 'caption' => 'Highfields'])
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ url('/breezeknoll') }}">
                    @include('modules.figure', ['imgSource' => '431HillsideAve', 'caption' => 'Breeze Knoll'])
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ url('/thewatcher') }}">
                    @include('modules.figure', ['imgSource' => 'watcher1_4-3b', 'caption' => 'The Watcher'])
                </a>

            </div>

        </div>
        <div class='row'>
            <div class='col-lg-4'>
                Podcasts
            </div>
        </div>
        <div class='row'>
            <div class='col-lg-4'>
                <a href="{{ url('/10050cielo') }}">
                    @include('modules.figure', ['imgSource' => '10050cielo512', 'caption' => '10050 Cielo Drive'])
                </a>
            </div>
        </div>

    </div>
@endsection
