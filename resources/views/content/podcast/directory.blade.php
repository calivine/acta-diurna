@extends('layouts.master')

@section('title', 'Nightmare Houses Podcast')

@section('content')
    <div class="container-fluid">
        <h1 class="post__title">Welcome to Nightmare Houses Podcast.</h1>
        @include('modules.figure', ['imgSource' => 'NightmareHousesLogo'])


        <figure>
            <figcaption><h3>Introduction</h3></figcaption>
            <audio
                    controls
                    src={{ asset('storage/media/NightmareHouses_Intro_Master.mp3/') }}>
                Your browser does not support the
                <code>audio</code> element.
            </audio>
        </figure>
        <div class="row">

            <div class="col-lg-4 mx-auto my-5">
                <a href="{{ url('/podcasts/10050cielo') }}" class="text-decoration-none">
                    @include('modules.thumbnail', ['imgSource' => '10050cielo512', 'caption' => 'S1 E1: 10050 Cielo Drive'])
                </a>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4 mx-auto my-5">
                <a href="{{ url('/podcasts/3301waverly') }}" class="text-decoration-none">
                    @include('modules.thumbnail', ['imgSource' => 'LaBianca_residence_in_Los_Feliz_Thumb', 'caption' => 'S1 E2: 3301 Waverly Drive'])
                </a>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 mx-auto my-5">
                <a href="{{ url('/podcasts/watts') }}" class="text-decoration-none">
                    @include('modules.thumbnail', ['imgSource' => 'watts', 'caption' => 'S1 E3: The Watts Family Home'])
                </a>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-4 mx-auto my-5">
                <a href="{{ url('/podcasts/breezeknoll') }}" class="text-decoration-none">
                    @include('modules.thumbnail', ['imgSource' => '431HillsideAve', 'caption' => 'S1 E4: Breezeknoll'])
                </a>
            </div>

        </div>

    </div>
@endsection

