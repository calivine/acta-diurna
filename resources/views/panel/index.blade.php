@extends('layouts.master')

@section('title', 'ThrillGifs | Panel')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-6">
                        <button class="btn-info"><a href="{{ route('prune') }}">Prune Tags</a></button>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn-info"><a href="{{ route('weight') }}">Re-Weight Tags</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
