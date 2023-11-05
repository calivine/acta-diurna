@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <hgroup>
                    <h1 class="post-title">  {{ $podcast->title }}</h1>

                </hgroup>
                <p class="post-date">{{ $podcast->published->format('F jS, Y') }} </p>
                @include('modules.figure', ['imgSource' => $podcast->thumbnail])
                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/{{ $podcast->rss }}"><h3>Nightmare Houses {{ 'S' . $podcast->season . ' E' . $podcast->episode }}</h3></a></figcaption>
                    <iframe src="https://player.rss.com/nightmarehouses/{{ $podcast->rss }}?theme=light" style="width: 100%"
                            title="Nightmare Houses" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen><a href="https://rss.com/podcasts/nightmarehouses/{{ $podcast->rss }}">{{ $podcast->title }} | RSS.com</a></iframe>
                </figure>

                <article>
                    <p>
                        {!! nl2br(e($podcast->description)) !!}
                    </p>
                    @if($podcast->title == "What Happened On Lindley Street")
                        <a href="{{ route('lindleyRefs') }}">References</a>
                    @endif

                    <a href="{{ route('getReferences', ["s" . $podcast->season . "e" . $podcast->episode]) }}">References</a>

                </article>

                @if($podcast->title == "The Watcher")
                    <iframe style="width: 100%; height: 50vh" src="https://www.youtube.com/embed/Mu8iMwOKyEM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                @endif



                <section>
                    @foreach($podcast->images->sortBy('position') as $image)
                        @if($image->filename != $podcast->thumbnail)
                            @include('modules.figure', ['imgSource' => $image->filename, 'caption' => $image->caption])
                        @endif
                    @endforeach
                </section>
            </div>
        </div>
    </div>



@endsection
