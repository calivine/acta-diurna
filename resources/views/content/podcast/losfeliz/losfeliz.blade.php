@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">May 24th, 2022 </p>
                <hgroup>
                    <h1 class="post__title">Los Feliz Mystery House</h1>
                    @include('modules.figure', ['imgSource' => 'The_Los_Angeles_Times_Sun__Dec_4__1932_ (1)'])

                </hgroup>
                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/497882?theme=light"><h3>Nightmare
                                Houses S01
                                E08</h3></a></figcaption>
                    <iframe src="https://player.rss.com/nightmarehouses/497882?theme=light" style="width: 100%"
                            title="Nightmare Houses" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen><a href="https://rss.com/podcasts/nightmarehouses/497882/">The Los Feliz
                            Mystery House | RSS.com</a></iframe>

                    <iframe src="https://player.rss.com/nightmarehouses/505689?theme=light" style="width: 100%"
                            title="Nightmare Houses" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen><a href="https://rss.com/podcasts/nightmarehouses/505689/">Los Feliz Mystery
                            House Part 2 | RSS.com</a></iframe>
                </figure>


                <article>


                    <p>
                        In December 1959 a murder/suicide occurred in a 1920s Spanish and Italian style home in the Los
                        Feliz Hills neighborhood of Los Angeles, California. But was the property doomed from the start?<br><br>Welcome
                        to Nightmare Houses.
                    </p>

                    @for ($i = 2; $i <= 56; $i++)
                        @include('modules.figure', ['imgSource' => $i])
                    @endfor

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
