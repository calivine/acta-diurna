@extends('layouts.master')

@section('title', 'Panel')

@section('content')
    <div class="container">
        <div class="settings__container">
            <div class="nav__wrapper">
                <!-- IDs nav__<target> == display__<target> -->
                <div class="nav__item" id="nav__user">
                    User
                </div>
                <div class="nav__item" id="nav__theme">
                    Theme
                </div>
                <div class="nav__item" id="nav__tags">
                    Tags
                </div>
            </div>
            <div class="display__container">
                <div class="form__wrapper active" id="display__theme">
                    <div class="input__wrapper">
                        <input type="radio" id="radio1" name="theme" checked>
                        <label for="radio1">Light</label>
                    </div>
                    <div class="input__wrapper">
                        <input type="radio" id="radio2" name="theme">
                        <label for="radio2">Dark</label>
                    </div>
                    <div class="input__wrapper">
                        <input type="radio" id="radio3" name="theme">
                        <label for="radio3">Custom</label>
                    </div>
                </div>
                <div class="form__wrapper" id="display__user">
                    <p>User settings</p>
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
                <div class="form__wrapper" id="display__tags">
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
                </div>
            </div>
        </div>
    </div>

@endsection
