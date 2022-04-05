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
                <figcaption><a href="https://rss.com/podcasts/nightmarehouses/435429/"><h3>Nightmare Houses S1 E2</h3></a></figcaption>
                <audio
                    controls
                    src={{ asset('storage/media/3301_Waverly_Drive_pod_master.mp3/') }}>
                Your browser does not support the
                <code>audio</code> element.
                </audio>
            </figure>

            <article>


                <p>
                    Following the events of August 9, 1969, more gruesome murders occurred in an early 1920's Spanish style bungalow at 3301 Waverly Drive, Los Angeles, CA.
                </p>
            </article>

            <article>
                <h1>Special Thanks</h1>
                <p>
                    Stacy Martire<br>Darb<br>NJ<br>Jeff<br>Sam Whitfield, <a href="https://twitter.com/SamW_NGC">Twitter</a>, <a href="https://www.patreon.com/whitfieldreport">Patreon</a> <br>Gnome<br>Kelly<br>Paul<br>Joe Oliva<br>Martin Willis<br>

                </p>


            </article>

            @include('modules.figure', ['imgSource' => 'ca-times.brightspotcdnCopInFront','caption' => ''])
            @include('modules.figure', ['imgSource' => 'helterskelter','caption' => ''])
            @include('modules.figure', ['imgSource' => 'rise','caption' => ''])
            @include('modules.figure', ['imgSource' => 'deathtopigs','caption' => ''])
            @include('modules.figure', ['imgSource' => 'LaBianca_residence_in_Los_Feliz','caption' => ''])



            <section class="mt-4">
                <p><a href="{{ url('/articles/3301waverly/bibliography') }}">Bibliography</a></p>
                <p>Impromptu in Quarter by <a href="http://incompetech.com">Kevin MacLeod</a> Creative Commons — Attribution 4.0 International — CC BY 4.0
                    <a href="https://bit.ly/impromptu-in-quarter">Free Download / Stream</a></p>
                <p><a href="https://youtu.be/VW7dU23RQuA">Music promoted by Audio Library</a></p>
            </section>
        </div>


    </div>

</div>


@endsection

