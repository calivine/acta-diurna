@extends('layouts.master')

@section('title', $status_code)

@section('content')
    <main class="container {{ is_null(Cookie::get('theme')) ? 'light' : Cookie::get('theme') }}">
        <div class="row">
            <div class="col-lg-9">
                <h1>Error: {{ $status_code }}</h1>
            </div>
        </div>
    </main>
@endsection
