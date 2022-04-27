@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">April 5, 2022</p>
                <hgroup>
                    <h1 class="post__title">3301 Waverly Drive<br>Los Angeles, CA</h1>
                </hgroup>
                @include('modules.figure', ['imgSource' => 'LaBianca_residence_in_Los_Feliz', 'caption' => '3301 Waverly Drive'])

                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/435429/"><h3>Nightmare Houses S01
                                E02</h3></a></figcaption>
                    <iframe src="https://player.rss.com/nightmarehouses/444842?theme=light" style="width: 100%"
                            title="Nightmare Houses" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen><a href="https://rss.com/podcasts/nightmarehouses/444842/">3301 Waverly
                            Drive | RSS.com</a></iframe>
                </figure>

                <article>


                    <p>
                        Following the events of August 9, 1969, more gruesome murders occurred in an early 1920's
                        Spanish style bungalow at 3301 Waverly Drive, Los Angeles, CA.
                    </p>
                </article>


                @include('modules.figure', ['imgSource' => 'ca-times.brightspotcdnCopInFront','caption' => ''])
                @include('modules.figure', ['imgSource' => 'helterskelter','caption' => ''])
                @include('modules.figure', ['imgSource' => 'rise','caption' => ''])
                @include('modules.figure', ['imgSource' => 'deathtopigs','caption' => ''])
                @include('modules.figure', ['imgSource' => 'LaBianca_residence_in_Los_Feliz','caption' => ''])


                <section class="mt-4">
                    <p><a href="{{ url('/articles/3301waverly/bibliography') }}">Bibliography</a></p>
                    <p>Impromptu in Quarter by <a href="http://incompetech.com">Kevin MacLeod</a> Creative Commons —
                        Attribution 4.0 International — CC BY 4.0
                        <a href="https://bit.ly/impromptu-in-quarter">Free Download / Stream</a></p>
                    <p><a href="https://youtu.be/VW7dU23RQuA">Music promoted by Audio Library</a></p>
                </section>
            </div>


        </div>

    </div>


@endsection

