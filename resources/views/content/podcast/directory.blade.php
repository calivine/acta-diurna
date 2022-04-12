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
        <div class='row'>
            <div class='col-lg-4'>

            </div>
            <div class='col-lg-4'>
                <a href="{{ url('/10050cielo') }}">
                    @include('modules.figure', ['imgSource' => '10050cielo512', 'caption' => 'S1 E1: 10050 Cielo Drive'])
                </a>
            </div>
            <div class='col-lg-4'>

            </div>
        </div>

        <div class='row'>
            <div class='col-lg-4'>

            </div>
            <div class='col-lg-4'>
                <a href="{{ url('/3301waverly') }}">
                    @include('modules.figure', ['imgSource' => 'LaBianca_residence_in_Los_Feliz', 'caption' => 'S1 E2: 3301 Waverly Drive'])
                </a>
            </div>
            <div class='col-lg-4'>

            </div>
        </div>

        <div class='row'>
            <div class='col-lg-4'>

            </div>
            <div class='col-lg-4'>
                <a href="{{ url('/watts') }}">
                    @include('modules.figure', ['imgSource' => 'wattsthumb', 'caption' => 'S1 E3: The Watts Family Home'])
                </a>
            </div>
            <div class='col-lg-4'>

            </div>
        </div>

    </div>
@endsection

