@extends('layouts.master')

@section('title', 'Nightmare Houses')

@section('content')
    <div class="container-fluid">
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
                    @include('modules.figure', ['imgSource' => 'watcher1_4-3', 'caption' => 'The Watcher'])
                </a>

            </div>

        </div>

    </div>
@endsection
