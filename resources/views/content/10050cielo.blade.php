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

                @include('modules.figure', ['imgSource' => '1-hGQe1zIc8h6LGjtUyfTOtA'])

                @include('modules.figure', ['imgSource' => '1-k9C-LKaKcglw8hVT4-ybzg'])

                @include('modules.figure', ['imgSource' => '1-CcmfC_dt9OiicOH93S1zbA'])

                @include('modules.figure', ['imgSource' => '1-DMFUr0LA4yBDrkbRxTwb_w'])

                @include('modules.figure', ['imgSource' => '1-OFaU_S3PFJE5oDXZlxl9TQ'])

                @include('modules.figure', ['imgSource' => '1-SJV4wByDwuk1KqyP3Wvo1Q'])

                @include('modules.figure', ['imgSource' => '1-tDMw6wl2sF3Ozf4YZZKplA'])

                @include('modules.figure', ['imgSource' => '1-z8el_NU3t192BeUS6ICYog'])

                @include('modules.figure', ['imgSource' => '1-A4bgP2IEvJkV3lxAS8PLCw'])

                @include('modules.figure', ['imgSource' => '11011890_428968467253314_7300078550193562103_o'])

                @include('modules.figure', ['imgSource' => 'images'])

                @include('modules.figure', ['imgSource' => 'cfd76681c4a86363a2206e9aad2c87ca'])

                @include('modules.figure', ['imgSource' => 'AP_17325061541701'])

                <section class="mt-4">
                    <p><a href="{{ url('/articles/10050cielo/bibliography') }}">Bibliography</a></p>
                </section>
            </div>


        </div>

    </div>


@endsection
