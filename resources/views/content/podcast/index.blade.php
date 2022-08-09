@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">{{ $podcast->published->format('F jS, Y') }} </p>
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

                <section>
                    @foreach($podcast->images as $image)
                        @if($image->filename != $podcast->thumbnail)
                            @include('modules.figure', ['imgSource' => $image->filename, 'caption' => $image->caption])
                        @endif
                    @endforeach
                </section>
            </div>
        </div>
    </div>



@endsection
