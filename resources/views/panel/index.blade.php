@extends('layouts.master')

@section('title', 'Nightmare Houses | Panel')

@section('content')
    <div class="container">
        <div class="settings__container">
            <div class="left">
                <div class="links_container">
                    <!-- IDs nav__<target> == display__<target> -->
                    @include('panel.partials.nav-button', ['label' => 'tags'])
                    @include('panel.partials.nav-button', ['label' => 'publisher', 'active' => 'nav__active'])

                </div>

            </div>
            <div class="right">
                <div class="form__wrapper active" id="display__publisher">
                    @include('panel.partials.podcasts')
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

                        <form class="box" action="{{-- route('upload') --}}" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box__input">
                                <input class="box__file" type="file" name="uploadFile" id="file"
                                       data-multiple-caption="{count} files selected" multiple/>
                                <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                                <button class="box__button" type="submit">Upload</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

