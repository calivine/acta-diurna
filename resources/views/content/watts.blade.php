@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">April 12, 2022</p>
                <hgroup>
                    <h1 class="post__title">The Watts Family Home</h1>
                </hgroup>
                @include('modules.figure', ['imgSource' => 'wattsthumb', 'caption' => 'The Watts Family Home'])

                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/452808/"><h3>Nightmare Houses S1 E3</h3></a></figcaption>
                    <audio
                            controls
                            src={{ asset('storage/media/WattsFamilyPodcastCompressed.mp3/') }}>
                        Your browser does not support the
                        <code>audio</code> element.
                    </audio>
                </figure>

                <article>


                    <p>
                        In August, 2018, a pregnant Colorado mother her two young daughters were reported missing; Her husband was arrested for their murder shortly after. They were the only family to ever live there and is still owned by the murderer.
                    </p>
                </article>



                @include('modules.figure', ['imgSource' => '19656912_10154669273621935_7759425943718107710_n','caption' => ''])

                @include('modules.figure', ['imgSource' => '21106581_10154822498201935_3090931803361117502_n','caption' => ''])

                @include('modules.figure', ['imgSource' => '21314450_10154843314551935_6227075305904700862_n','caption' => ''])
                @include('modules.figure', ['imgSource' => '27971890_10155221240806935_5719062064701943373_n','caption' => ''])
                @include('modules.figure', ['imgSource' => '29594764_10155322825636935_2000737157893127954_n','caption' => ''])
                @include('modules.figure', ['imgSource' => '29694512_10155324674376935_3579280962614315746_n','caption' => ''])
                @include('modules.figure', ['imgSource' => '30629929_10155364144861935_7435001657703565985_n','caption' => ''])
                @include('modules.figure', ['imgSource' => '30707075_10155364144871935_3695971273705171649_n','caption' => ''])
                @include('modules.figure', ['imgSource' => '30697973_10215990348301877_1215875576158486528_n','caption' => ''])




                <section class="mt-4">
                    <p><a href="{{ url('/articles/watts/bibliography') }}">Bibliography</a></p>
                    <p>Impromptu in Quarter by <a href="http://incompetech.com">Kevin MacLeod</a> Creative Commons — Attribution 4.0 International — CC BY 4.0
                        <a href="https://bit.ly/impromptu-in-quarter">Free Download / Stream</a></p>
                    <p><a href="https://youtu.be/VW7dU23RQuA">Music promoted by Audio Library</a></p>
                </section>
            </div>


        </div>

    </div>


@endsection


