@extends('layouts.master')

@section('title', 'ThrillGifs | Panel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <div>Password</div>
                <div>Theme</div>
            </div>
            <div class="col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <a href="{{ route('prune') }}"><button class="btn btn-red-gradient btn-block">Prune Tags</button></a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <a href="{{ route('weight') }}"><button class="btn btn-purple btn-block">Re-Balance</button></a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                                {{ __('Change Password') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
