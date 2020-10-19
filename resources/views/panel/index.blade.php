@extends('layouts.master')

@section('title', 'ThrillGifs | Panel')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <h2 class="mx-auto mt-2">Control Panel</h2>
                    <div class="card-body">
                        <div class="col-lg-3">
                            <a href="{{ route('prune') }}"><button class="btn btn-red-gradient btn-block">Prune Tags</button></a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('weight') }}"><button class="btn btn-purple btn-block">Re-Balance</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
