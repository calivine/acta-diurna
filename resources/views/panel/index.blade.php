@extends('layouts.master')

@section('title', 'Nightmare Houses | Panel')

@section('content')
    <div class="container">
        <div class="settings-container">
            <div class="left">
                <div class="links-container">
                    <!-- IDs nav__<target> == display__<target> -->
                    @include('panel.partials.nav-button', ['label' => 'directory', 'active' => 'nav-active'])
                    @include('panel.partials.nav-button', ['label' => 'publisher'])

                </div>

            </div>
            <div class="right">
                <div class="form-wrapper" id="display-publisher">
                    @include('panel.partials.podcasts')
                </div>


                <div class="form-wrapper active" id="display-directory">
                    <div class="row justify-content-center">
                        @include('panel.partials.directory', ['podcasts' => $podcasts])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

