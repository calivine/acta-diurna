@extends('layouts.master')

@section('title', 'Nightmare Houses | Panel')

@section('content')
    <div class="container">
        <div class="settings-container">
            <div class="left">
                <div class="links-container">
                    <!-- IDs nav__<target> == display__<target> -->
                    @include('panel.partials.nav-button', ['label' => 'directory'])
                    @include('panel.partials.nav-button', ['label' => 'publisher', 'active' => 'nav-active'])

                </div>

            </div>
            <div class="right">
                <div class="form-wrapper active" id="display-publisher">
                    @include('panel.partials.podcasts')
                </div>


                <div class="form-wrapper" id="display-directory">
                    <div class="row justify-content-center">
                        @include('panel.partials.directory', ['podcasts' => $podcasts])

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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

