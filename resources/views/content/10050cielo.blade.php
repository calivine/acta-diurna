@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">March 29, 2022</p>
            </div>
            <hgroup>
                <h1 class="post__title">10050 Cielo Drive<br>Los Angeles, CA</h1>
            </hgroup>
            @include('modules.figure', ['imgSource' => '10050cielo', 'caption' => '10050 Cielo Drive'])
            
        </div>

    </div>


@endsection
