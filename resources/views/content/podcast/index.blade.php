@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">{{ $podcast->published }} </p>
                <hgroup>
                    <h1 class="post__title">  {{ $podcast->title }}</h1>

                </hgroup>
                @include('modules.figure', ['imgSource' => $podcast->thumbnail])
                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/{{ $podcast->rss }}"><h3>Nightmare Houses {{ 'S0' . $podcast->season . ' E' . $podcast->episode }}</h3></a></figcaption>
                    <iframe src="https://player.rss.com/nightmarehouses/{{ $podcast->rss }}?theme=light" style="width: 100%"
                            title="Nightmare Houses" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen><a href="https://rss.com/podcasts/nightmarehouses/{{ $podcast->rss }}">{{ $podcast->title }} | RSS.com</a></iframe>
                </figure>


                <article>


                    <p>
                        {!! nl2br(e($podcast->description)) !!}
                    </p>


                </article>


                <section class="mt-4">

                    <p>Impromptu in Quarter by <a href="http://incompetech.com">Kevin MacLeod</a> Creative Commons —
                        Attribution 4.0 International — CC BY 4.0
                        <a href="https://bit.ly/impromptu-in-quarter">Free Download / Stream</a></p>
                    <p><a href="https://youtu.be/VW7dU23RQuA">Music promoted by Audio Library</a></p>
                </section>
            </div>
        </div>
    </div>



@endsection
