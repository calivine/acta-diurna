@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">March 29, 2022</p>
                <hgroup>
                    <h1 class="post__title">10050 Cielo Drive<br>Los Angeles, CA</h1>
                </hgroup>
                @include('modules.figure', ['imgSource' => '10050cielo', 'caption' => '10050 Cielo Drive'])

                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/435429/"><h3>Nightmare Houses S1 E1</h3></a></figcaption>
                    <audio
                            controls
                            src={{ asset('storage/media/10050_cielo_drive_1_master.mp3/') }}>
                        Your browser does not support the
                        <code>audio</code> element.
                    </audio>
                </figure>

                <article>


                    <p>
                        In the early hours of August 9, 1969 one of the most gruesome murders occurred in a 1940's European Style Farmhouse at 10050 Cielo Drive, Los Angeles, CA.
                    </p>
                </article>

                <article>
                    <h1>Special Thanks</h1>
                    <p>
                        Stacy Martire<br>Darb<br>NJ<br>Jeff<br>Sam Whitfield <br>Gnome<br>Kelly<br>Paul<br>Joe Oliva<br>Martin Willis<br>

                    </p>
                    <p>Impromptu in Quarter by <a href="http://incompetech.com">Kevin MacLeod</a> Creative Commons — Attribution 4.0 International — CC BY 4.0
                        <a href="https://bit.ly/impromptu-in-quarter">Free Download / Stream</a></p>
                    <p><a href="https://youtu.be/VW7dU23RQuA">Music promoted by Audio Library</a></p>

                </article>

                @include('modules.figure', ['imgSource' => 'cfd76681c4a86363a2206e9aad2c87ca','caption' => 'Michele Morgan in living room circa 1942.'])

                @include('modules.figure', ['imgSource' => '1-OFaU_S3PFJE5oDXZlxl9TQ','caption' => 'A French magazine article featuring Michele Morgan at home.'])

                @include('modules.figure', ['imgSource' => '1-DMFUr0LA4yBDrkbRxTwb_w','caption' => 'Lillian Gish sitting at the wishing well at 10050 Cielo Drive circa 1946.'])

                @include('modules.figure', ['imgSource' => '1-tDMw6wl2sF3Ozf4YZZKplA','caption' => 'Mark Lindsay and Terry Melcher circa 1960s.'])

                @include('modules.figure', ['imgSource' => '11011890_428968467253314_7300078550193562103_o','caption' => '1960s image of the pool.'])

                @include('modules.figure', ['imgSource' => '1-CcmfC_dt9OiicOH93S1zbA','caption' => '1966 photograph of actress Samantha Egger next to the pool.'])

                @include('modules.figure', ['imgSource' => '1-k9C-LKaKcglw8hVT4-ybzg', 'caption' => 'Candice Bergen and Terry Melcher in 1968.'])

                @include('modules.figure', ['imgSource' => '1-z8el_NU3t192BeUS6ICYog','caption' => 'Wojciech Frykowski and Abigail Folger photo undated, circa 1960s.'])

                @include('modules.figure', ['imgSource' => '1-SJV4wByDwuk1KqyP3Wvo1Q','caption' => 'William Garretson at 10050 Cielo Drive circa 1960s.'])

                @include('modules.figure', ['imgSource' => 'parent','caption' => 'Stephen Parent 1969 graduation photo.'])

                @include('modules.figure', ['imgSource' => 'tateandseabring','caption' => 'Sharon Tate and Jay Seabring August 1969 photo by Wojciech Frykowski.'])

                @include('modules.figure', ['imgSource' => 'images','caption' => 'Livingroom in 10050 Cielo Drive after 1969 murders.'])

                @include('modules.figure', ['imgSource' => '1-hGQe1zIc8h6LGjtUyfTOtA','caption' => 'Roman Polanski on the front porch of 10050 Cielo Drive. Sharon Tate\'s blood was used write the word "PIG" on the front door.'])

                @include('modules.figure', ['imgSource' => '1-A4bgP2IEvJkV3lxAS8PLCw','caption' => 'Mediterranean-style mansion that sits on the property currently. Image from 2010.'])

                <section class="mt-4">
                    <p><a href="{{ url('/articles/10050cielo/bibliography') }}">Bibliography</a></p>
                </section>
            </div>


        </div>

    </div>


@endsection
