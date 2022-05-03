@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">May 3, 2022</p>
                <hgroup>
                    <h1 class="post__title">Menendez Brothers Murder House</h1>

                </hgroup>
                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/474168/"><h3>Nightmare Houses S01
                                E05</h3></a></figcaption>
                    <iframe src="https://player.rss.com/nightmarehouses/474168" style="width: 100%"
                            title="Nightmare Houses" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen><a href="https://rss.com/podcasts/nightmarehouses/474168/">Menendez Brothers
                            Murder House | RSS.com</a></iframe>
                </figure>


                <article>


                    <p>

                    </p>
                </article>

                @include('modules.figure', ['imgSource' => 'menendez-home-in-beverly-hills-1505921806'])
                @include('modules.figure', ['imgSource' => 'LyleandErikMenendezincourt'])
                @include('modules.figure', ['imgSource' => 'KittyMenendez'])
                @include('modules.figure', ['imgSource' => 'JoseMenendez'])
                @include('modules.figure', ['imgSource' => '1612888363702'])

                @include('modules.figure', ['imgSource' => 'b1b0a236df5575e36931e7c5066a9b53-2'])
                @include('modules.figure', ['imgSource' => 'JoseandKitty'])
                @include('modules.figure', ['imgSource' => '1634328892298'])
                @include('modules.figure', ['imgSource' => '1634328817251'])



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
