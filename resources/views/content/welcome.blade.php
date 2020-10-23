@extends('layouts.master')

@section('title', 'ThrillGifs')

@section('content')
    <div class="container-fluid">
        {{ Cookie::get('theme') }}
    </div>
@endsection
