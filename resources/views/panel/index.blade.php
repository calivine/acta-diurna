@extends('layouts.master')

@section('title', 'Nightmare Houses | Panel')

@section('content')
    <div class="container">
        <div class="settings__container">
            <div class="left">
                <div class="links_container">
                    <!-- IDs nav__<target> == display__<target> -->
                    <div class="nav_link" id="nav__user">
                        User
                    </div>
                    <div class="nav_link nav__active" id="nav__theme">
                        Theme
                    </div>
                    <div class="nav_link" id="nav__tags">
                        Tags
                    </div>
                </div>

            </div>
            <div class="right">
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
                    <h2 class="title">User settings</h2>
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
                    {{--
                        <div class="col-md-2">
                            <a href="{{ route('prune') }}"><button class="btn btn-red-gradient btn-block">Prune Tags</button></a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <a href="{{ route('weight') }}"><button class="btn btn-purple btn-block">Re-Balance</button></a>
                        </div>
                    </div>
                    --}}

                        <form class="box" action="{{-- route('upload') --}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box__input">
                                <input class="box__file" type="file" name="uploadFile" id="file" data-multiple-caption="{count} files selected" multiple />
                                <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                                <button class="box__button" type="submit">Upload</button>
                            </div>
                            <div class="box__uploading">Uploading...</div>
                            <div class="box__success">Done!</div>
                            <div class="box__error">Error! <span></span>.</div>
                        </form>
                </div>


            </div>
        </div>
    </div>

@endsection

