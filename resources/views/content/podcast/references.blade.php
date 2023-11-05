@extends('layouts.master')

@section('title', 'Nightmare Houses Podcast')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="bibliography-header">
                    Links & Sources
                </h1>
                <ul class="bibliography">
                    @foreach($podcast->references as $reference)
                        <li>
                            {!! $reference->url ?? $reference->label !!}
                        </li>
                    @endforeach
                </ul>


            </div>
        </div>
    </div>


@endsection
