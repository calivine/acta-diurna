@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">April 26, 2022</p>
                <hgroup>
                    <h1 class="post__title">431 Hillside Avenue<br>Westfield, NJ</h1>
                    <h2 class="post__subtitle">AKA “Breeze Knoll”<br>ca. 1896-1972</h2>
                </hgroup>

                <figure>
                    <audio
                            controls
                            src={{ asset('storage/media/Breezeknoll.mp3/') }}>
                        Your browser does not support the
                        <code>audio</code> element.
                    </audio>
                </figure>

                <article>


                    <p>

                    </p>
                </article>

                @include('modules.figure', ['imgSource' => '431HillsideAve', 'caption' => 'Breeze Knoll'])
                @include('modules.figure', ['imgSource' => '431HillsideAveAerial', 'caption' => 'Aero-view of Westfield, New Jersey 1929.Location of Hillside Ave./Breeze Knoll circled.'])
                @include('modules.figure', ['imgSource' => 'BreezeknollAerial2', 'caption' => 'Detail of the Aero-view of Westfield, NJ, 1929 of Breeze Knoll. It is the last house on the upper right hand corner.'])
                @include('modules.figure', ['imgSource' => 'entryway', 'caption' => 'The art gallery/ballroom at Breeze Knoll in the 1920s. Note the mahogany entryway with the three pronged, globe capped sconces, picture and base molding. Oak paneling with a herringbone pattern covered the floors.'])
                @include('modules.figure', ['imgSource' => 'breezeKnollWedding1', 'caption' => ''])
                @include('modules.figure', ['imgSource' => 'breezeKnollWedding2', 'caption' => 'Original newspaper article detailing Gertrude Wittke’s wedding at Breeze Knoll in 1906. The Plainfield Courier-News, October 11, 1906'])
                @include('modules.figure', ['imgSource' => 'westfieldSocialNotes', 'caption' => 'The Courier News, Saturday, October 29, 1932. Bridgewater, New Jersey'])
                @include('modules.figure', ['imgSource' => 'janeAlpers', 'caption' => 'Wedding reception for this couple was held at Breeze Knoll in 1950. Plainfield Courier-News, August 26, 1950.'])
                @include('modules.figure', ['imgSource' => 'courierJuly28', 'caption' => 'Plainfield Courier-News, Tuesday, July 28, 1908. Plainfield, New Jersey'])
                @include('modules.figure', ['imgSource' => 'westfieldResidentDies', 'caption' => 'Announcement of Phoebe Wittke’s death in January 1929. She died in Breeze Knoll. Plainfield Courier-News, January 15, 1929'])
                @include('modules.figure', ['imgSource' => 'wittke2', 'caption' => 'Plainfield Courier-News, Thursday, May 28, 1936'])
                @include('modules.figure', ['imgSource' => 'listPortrait', 'caption' => 'John List with his wife Helen, Patricia, John Jr., and Frederick. 1971'])
                @include('modules.figure', ['imgSource' => 'list1951b', 'caption' => 'Helen Taylor (left), her sister Gene (middle), and John List (right) the night they met. October 13, 1951'])

                @include('modules.figure', ['imgSource' => 'breezeknoll', 'caption' => 'Breeze Knoll 431 Hillside Ave. in the 1970s'])
                @include('modules.figure', ['imgSource' => 'listAndFamily', 'caption' => 'John List with his children for a church photo in 1967.', 'link' => 'https://www.reddit.com/r/myfavoritemurder/comments/d4zk7c/my_dad_went_to_church_with_the_list_family/', 'linkText' => 'Source'])


                @include('modules.figure', ['imgSource' => 'patriciaMList', 'caption' => 'Patricia Morris List was the third victim. She was shot in the back entryway of Breeze Knoll. She still had on her coat from outside when she died. '])

                @include('modules.figure', ['imgSource' => 'FMList', 'caption' => 'Frederick Michael List, aged 13 (1958-1971), was the fourth victim of his father’s killing spree.'])

                @include('modules.figure', ['imgSource' => 'JFList', 'caption' => 'John Frederick List, aged 15 (1956-1971), was the final family member to die. He was shot several times due to a misfire and likely tried to fight back, something his father was probably not expecting. '])

                @include('modules.figure', ['imgSource' => 'bodies', 'caption' => 'The bodies of Helen, Patricia, Frederick, and John Jr. List in the ballroom of Breeze Knoll. They were placed just inside the doorway, of the right-hand side, near the grand fireplace in the ballroom. Helen is in her nightgown and slippers; the children all still have their outerwear on.'])
                @include('modules.figure', ['imgSource' => 'getty_kitchen', 'caption' => 'The kitchen leading into the ballroom. The body drag marks on the hallway rug are visible. The light switch also appears to be broken and held up with tape. Helen was killed at the kitchen table, while the children were killed in the back entrance off the kitchen.'])
                @include('modules.figure', ['imgSource' => 'gettyPolice', 'caption' => 'Police examine the kitchen and find a bullet hole in the lower kitchen cabinets, possibly the one that killed Helen List. '])
                @include('modules.figure', ['imgSource' => 'gettyKitchen2', 'caption' => 'Bloodstains on the linoleum kitchen floor. John List cleaned up most of the mess with paper towels following the murders.'])


                <section class="mt-4">
                    <p><a href="{{ url('/articles/breezeknoll/bibliography') }}">Bibliography</a></p>
                    <p>Impromptu in Quarter by <a href="http://incompetech.com">Kevin MacLeod</a> Creative Commons — Attribution 4.0 International — CC BY 4.0
                        <a href="https://bit.ly/impromptu-in-quarter">Free Download / Stream</a></p>
                    <p><a href="https://youtu.be/VW7dU23RQuA">Music promoted by Audio Library</a></p>
                </section>
            </div>
        </div>
    </div>



@endsection
