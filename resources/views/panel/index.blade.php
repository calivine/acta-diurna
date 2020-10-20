@extends('layouts.master')

@section('title', 'ThrillGifs | Panel')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('prune') }}"><button class="btn btn-red-gradient btn-block">Prune Tags</button></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('weight') }}"><button class="btn btn-purple btn-block">Re-Balance</button></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (Route::has('password.request'))
                    <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                        {{ __('Change Password') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
