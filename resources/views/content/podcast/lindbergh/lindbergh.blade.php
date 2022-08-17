@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post-date">May 10, 2022</p>
                <hgroup>
                    <h1 class="post-title">Lindbergh's Baby Kidnapping</h1>
                    @include('modules.figure', ['imgSource' => '1'])

                </hgroup>
                <figure>
                    <figcaption><a href="https://rss.com/podcasts/nightmarehouses/482598/"><h3>Nightmare Houses S01
                                E06</h3></a></figcaption>
                    <iframe src="https://player.rss.com/nightmarehouses/482598?theme=light" style="width: 100%"
                            title="Nightmare Houses" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen><a href="https://rss.com/podcasts/nightmarehouses/482598/">Lindbergh's Baby
                            Kidnapping | RSS.com</a></iframe>
                </figure>


                <article>


                    <p>
                        On a cold night on March 1, 1932, the 1-year-old son of American aviator and hero, Charles Lindbergh, was reported kidnapped from the family home. <br><br>Welcome to Nightmare Houses.
                    </p>
                </article>

                @include('modules.figure', ['imgSource' => ''])

                @include('modules.figure', ['imgSource' => 'lindberg1929', 'caption' => 'Ann and Charles Lindberg, June 1929.', 'link' => 'https://www.digitalcommonwealth.org/search/commonwealth:6682zj24f', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'arialbw', 'caption' => 'Ongoing construction of Highfields, as seen in this aerial view in 1932.', 'link' => 'http://sharonscrapbook.blogspot.com/2013/01/cemetery-john-by-robert-zorn.html', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'transomWindow', 'caption' => 'Detail of the paneled door with sidelights and transom window.'])

                @include('modules.figure', ['imgSource' => 'aerial2', 'caption' => 'Aerial view of Highfields, ca. 1932.', 'link' => 'http://www.charleslindbergh.com/kidnap/index.asp', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'frontview', 'caption' => 'Highfields, ca. 2012. Many elements of the original structure remain.', 'link' => 'https://www.mlive.com/opinion/kalamazoo/2012/05/80_years_later_lindbergh_kidna.html', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'blueprints', 'caption' => 'Highfields Original Floor Plans.', 'link' => 'http://house-crazy.com/the-charles-lindbergh-house-in-hopewell-new-jersey/', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'withbaby', 'caption' => 'Anne Lindbergh and infant Charles Lindbergh, Jr., ca. 1930.', 'link' => 'https://www.mlive.com/opinion/kalamazoo/2012/05/80_years_later_lindbergh_kidna.html', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'withladder', 'caption' => 'Police and reporters examine the window from which Charles A. Lindbergh\'s baby was kidnapped. March 1932. ', 'link' => 'https://mholloway63.files.wordpress.com/2014/05/charles-lindbergh-estate-in-new-jersey2', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'Lindbergh_baby_poster', 'caption' => 'The Wanted poster that was widely printed after the kidnapping.', 'link' => 'https://www.mlive.com/opinion/kalamazoo/2012/05/80_years_later_lindbergh_kidna.html', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'carsoutfront', 'caption' => 'Highfields, March 1, 1932. Taken the night the baby was reported missing.', 'link' => 'http://www.lesliejonesphotography.com/collection/0806002464', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'blackman', 'caption' => ' William Allen, the man who found the baby. Photo taken May 12, 1932.', 'link' => 'https://www.digitalcommonwealth.org/search/commonwealth:6682zm407', 'linkText' => 'Image Source'])

                @include('modules.figure', ['imgSource' => 'colorhighfields', 'caption' => ' Highfields, looking at the window where the Lindbergh baby was kidnapped.', 'link' => 'https://www.sourland.org/history', 'linkText' => 'Image Source'])



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
