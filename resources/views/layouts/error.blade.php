@extends('layouts.master')

@section('title', '{{ $status_code }}')

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-lg-4">
                <h1>Error: {{ $status_code }}</h1>
            </div>
        </div>
    </main>
@endsection
