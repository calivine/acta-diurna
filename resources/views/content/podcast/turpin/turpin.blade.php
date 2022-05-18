@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">May 17th, 2022 </p>
                <hgroup>
                    <h1 class="post__title">The Turpin Family Home</h1>
                    @include('modules.figure', ['imgSource' => '5b816b9fc1d676e988478e2493bf6d36-uncropped_scaled_within_1536_1152'])
                </hgroup>
                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/490273/"><h3>Nightmare Houses S01
                                E07</h3></a></figcaption>
                    <iframe src="https://player.rss.com/nightmarehouses/490273?theme=light" style="width: 100%"
                            title="Nightmare Houses" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen><a href="https://rss.com/podcasts/nightmarehouses/490273/">The Turpin Family
                            Home | RSS.com</a></iframe>
                </figure>


                <article>


                    <p>
                        In January 2018, the world learned about a case where 13 children had been held captive,
                        tortured and starved by their own parents. The family was about to move to Oklahoma until one
                        brave 17 year old daughter escaped to save her siblings.<br><br>Welcome to Nightmare Houses.
                    </p>

                    @include('modules.figure', ['imgSource' => 'FortWorthStar'])
                    @include('modules.figure', ['imgSource' => 'Yearbook_profile_photo'])
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
