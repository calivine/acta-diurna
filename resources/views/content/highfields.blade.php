@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">November 24, 2020</p>
                    <hgroup>
                        <h1 class="post__title">Highfields<br>Hopewell, NJ</h1>
                        <h2 class="post__subtitle"><em>"Isn't it strange that we talk least about the things we think about most?"<br>— Charles Lindbergh</em></h2>
                    </hgroup>
                    @include('modules.figure', ['imgSource' => '1.jpg', 'caption' => 'Highfields, ca. 2007.', 'link' => 'https://en.wikipedia.org/wiki/Highfields_(Amwell_and_Hopewell,_New_Jersey)#/media/File:HIGHFIELDS,_EAST_AMWELL_TOWNSHIP,_HUNTERDON_COUNTY.jpg', 'linkText' => 'Image Source'])
                    <article>
                        <p>Highfields, the historical name for the property located in Hopewell/Amwell Townships in Hunterdon and Mercer Counties, New Jersey. Today, the New Jersey Department of Corrections owns the property, but it was initially the site of "the crime of the century."@include('modules.footnote', ['number' => '1'])</p>
                        <p>This private, domestic dwelling was built between 1931-1935 by Architects Delano & Aldrich, a prominent New York firm, and Matthews Construction Company as the contractor and builder. Charles and Anne (Morrow) Lindbergh had Highfields commissioned; it was their dream home.
                        </p>
                        @include('modules.figure', ['imgSource' => 'lindberg1929.jpg', 'caption' => 'Ann and Charles Lindberg, June 1929.', 'link' => 'https://www.digitalcommonwealth.org/search/commonwealth:6682zj24f', 'linkText' => 'Image Source'])
                        <p>It is a 2.5 story stone residence with mixed architectural styles that reflect the French and English Tudor Revival styles. Colonial Revival styles elements can be seen in various treatments, such as the primary entryway (north side of residence) to the double-hung and divided light window.@include('modules.footnote', ['number' => '2'])</p>
                        <p>The property sits on 380 acres in a heavily wooded region off a winding road, appropriately named Lindbergh Road. The building is obstructed from passersby and is highly private and set off a long, winding drive, approximately a half-mile from the main road.
                        </p>
                        @include('modules.figure', ['imgSource' => 'arialbw.jpg', 'caption' => 'Ongoing construction of Highfields, as seen in this aerial view in 1932.', 'link' => 'http://sharonscrapbook.blogspot.com/2013/01/cemetery-john-by-robert-zorn.html', 'linkText' => 'Image Source'])
                        <p>The exterior of the building is primarily masonry consisting of heavy rubble stone, locally quarried. A whitewash or white stucco surface covers the rubble stone, and the entryway is a massive, paneled door with sidelights and a transom window.@include('modules.footnote', ['number' => '3']) The windows are six-by-six and double-hung. The roof is a steep and cross-gabled slate, commonly found in Tudor style architecture.
                        </p>
                        @include('modules.figure', ['imgSource' => 'transomWindow.jpg', 'caption' => 'Detail of the paneled door with sidelights and transom window.'])
                        <p>After an extensive aerial and ground search on Sourland Mountain for a secluded spot within a commuting distance by both air and car to New York, Lindbergh found the site. The land was reportedly cheap, had plenty of stone for building, was secluded, and had views of abandoned fields, something one could use as a landing strip.
                        </p>
                        @include('modules.figure', ['imgSource' => 'aerial2.jpg', 'caption' => 'Aerial view of Highfields, ca. 1932.', 'link' => 'http://www.charleslindbergh.com/kidnap/index.asp', 'linkText' => 'Image Source'])
                        <p>The Lindberghs used an agent to  assemble titles to parcels of woodlands and farmland. Mrs. Lindbergh held the title to several hundred acres on Sourland Mountain by April 1931.
                        </p>
                        <p>
                            Chester Aldrich, of Delano & Aldrich, a close personal friend to Mrs. Lindbergh, had designed two other houses for the Morrow family. It is believed that Delano played little part in the design, spare his name. The Matthews Construction of Princeton, N.J. began work on the site in March of 1931, completing the house portion by late summer of that year.@include('modules.footnote', ['number' => '4'])
                        </p>
                        <p>It is unclear how much of a role the Lindberghs played in the design of the house. Still, it did reflect their desire for privacy and safety seen in several features throughout the house, such as discreetly camouflaged skylights in a 1.5" thick slate roof. The house's stone walls were 28" and gave the residence a "fortress-like" quality.
                        </p>
                        @include('modules.figure', ['imgSource' => 'frontview.jpg', 'caption' => 'Highfields, ca. 2012. Many elements of the original structure remain.', 'link' => 'https://www.mlive.com/opinion/kalamazoo/2012/05/80_years_later_lindbergh_kidna.html', 'linkText' => 'Image Source'])
                        <p>
                            The house's main structure contains two gable end facing wings on either side, giving a symmetrical appearance. The western wing wraps into the house's service quarters - extending southward beyond the façade of the main body.

                        </p>
                        <p>The house's interior contained a living room, dining room, library, kitchen with large pantry, four bathrooms, five bedrooms, servants quarters, and a three-car garage.</p>

                        @include('modules.figure', ['imgSource' => 'blueprints.jpg', 'caption' => 'Highfields Original Floor Plans.', 'link' => 'http://house-crazy.com/the-charles-lindbergh-house-in-hopewell-new-jersey/', 'linkText' => 'Image Source'])
                        <p>Anne and Charles Lindbergh were extremely famous, thanks to Charles's success in 1927 for being the first transcontinental flight, a solo-flight from New York to Paris in less than 34 hours. Lindbergh immediately became "America's Hero" and had charming good looks to match his heroic stature. Anne was the daughter of Dwight Morrow, a partner at JP Morgan and Co., United States ambassador to Mexico, and a Senator from New Jersey.</p>
                        <p>Charles met Anne in Mexico in December 1927. Her father had invited Charles down to Mexico City, where he served as Ambassador, to promote good relations. The couple married in May of 1929 and were at the height of their fame; hence the desire for a rural, private home to escape, after they welcomed their first child, Charles Augustus Lindbergh, Jr., in 1930.</p>

                        @include('modules.figure', ['imgSource' => 'withbaby.jpg', 'caption' => 'Anne Lindbergh and infant Charles Lindbergh, Jr., ca. 1930.', 'link' => 'https://www.mlive.com/opinion/kalamazoo/2012/05/80_years_later_lindbergh_kidna.html', 'linkText' => 'Image Source'])
                        <p>The most significant event to occur at the estate was on the night of Tuesday, March 1, 1932. It was reportedly 30 degrees Fahrenheit and frosty that night.</p>

                        <p>At 7:30 PM that evening, the family nurse, Betty Gow, put the 20 month-old Charles "Egg" Lindbergh, Jr. into his crib in the upstairs nursery. He had been sick with a cold just a few days prior and was just starting to feel better.</p>
                        <p>Around 9:30 PM that evening, Charles Lindbergh reported hearing a noise that he recalled as "slats breaking off a full crate in the kitchen."</p>
                        <p>At 10:00 PM that night, nurse Gow discovered that the child was no longer in his crib...and not with his mother, who had just left to take a bath. Gow reported to Lindbergh, the missing child, and Lindbergh found a note enclosed in an envelope placed on the windowsill. The envelope contained a ransom note with both bad grammar and handwriting- presumed to be the kidnappers'.</p>
                        <p>Reports indicated that Charles Lindbergh grabbed a gun and went outside around the house, accompanied by the family butler, Olly Whateley. Together, they found impressions in the ground under the window of the child's bedroom along with pieces of a homemade wooden ladder. Whately then ran inside to telephone the Hopewell, N.J. police department to inform them of the incident.</p>
                        <p>Since the house was still under construction at the time, a warped shutter could not be closed, providing a means of entry to a room that would have otherwise been secured against the winds that evening.</p>

                        <p>Charles called his attorney and friend, Henry Skillman Breckinridge, and the New Jersey State Police; they were en route to Highfields within 20 minutes. The New Jersey State Police controlled this operation.</p>
                        @include('modules.figure', ['imgSource' => 'withladder.jpg', 'caption' => 'Police and reporters examine the window from which Charles A. Lindbergh\'s baby was kidnapped. March 1932. ', 'link' => 'https://mholloway63.files.wordpress.com/2014/05/charles-lindbergh-estate-in-new-jersey2.jpg', 'linkText' => 'Image Source'])

                        @include('modules.figure', ['imgSource' => 'Lindbergh_baby_poster.jpg', 'caption' => 'The Wanted poster that was widely printed after the kidnapping.', 'link' => 'https://www.mlive.com/opinion/kalamazoo/2012/05/80_years_later_lindbergh_kidna.html', 'linkText' => 'Image Source'])
                        <p>From March until May of 1931, the garage at Highfields served as the search and investigation nerve center. This operation was controlled by the New Jersey State Police. Lindbergh also played a significant, active role in the search.</p>

                        @include('modules.figure', ['imgSource' => 'carsoutfront.jpg', 'caption' => 'Highfields, March 1, 1932. Taken the night the baby was reported missing.', 'link' => 'http://www.lesliejonesphotography.com/collection/0806002464', 'linkText' => 'Image Source'])
                        <p>On May 12, a delivery truck driver named William Allen pulled off to the side of the road about 4.5 miles south of the Lindbergh home. When he went to a grove of trees to urinate, he discovered the body of a toddler. Allen notified the police, who took the body to a morgue nearby in Trenton, NJ.
                        </p>
                        @include('modules.figure', ['imgSource' => 'blackman.jpg', 'caption' => ' William Allen, the man who found the baby. Photo taken May 12, 1932.', 'link' => 'https://www.digitalcommonwealth.org/search/commonwealth:6682zm407', 'linkText' => 'Image Source'])

                        <p>The elements had severely decomposed the body. Police discovered his skull was fractured and presumed that the baby died the night of his kidnapping. It was baby Lindbergh.</p>

                        <p>After discovering the fate of Baby Lindbergh, Anne and Charles left their Sourland Mountain home, never to spend another night there. They reportedly returned to the Morrow Estate in Englewood. It wasn't until the Lindberghs decided to leave their estate that it was finally named "Highfields."</p>
                        <p>
                            In June of 1933, Anne Lindbergh turned the house over to a corporation of trustees. That year she wrote, "we have called the place Highfields, in which there is a second secret meaning. It pleases me very much."@include('modules.footnote', ['number' => '5']) While unknown what the "secret" meaning is, there has been speculation that the name commemorates the infant's special greeting for his father.
                        </p>
                        <p>
                            The kidnapping publicity and aftermath forced the Lindberghs into a European exile, where they lived between 1935-1939.<br>
                        </p>
                        <p>By 1941, the Highfields Association conveyed the house and lands. Charles Lindbergh was president to the State of New Jersey, under the Department of Institutions and Agencies’ supervision. Since the 1950s, the home has served as a juvenile rehabilitation center by the New Jersey Department of Corrections.</p>
                        <p>Today, it is known as Developing Opportunities and Values through Education and Substance Abuse Treatment Residential Community Home (DOVES) under the Juvenile Justice Commission (JCC). The community serves the juvenile female population, ages ranging from 13-24, and hosts a maximum of 16 residents.@include('modules.footnote', ['number' => '6'])</p>
                        <p>
                            New Jersey had the property added to the Register of Historic Places in 1994. It is not open to the public.<br>
                        </p>
                        @include('modules.figure', ['imgSource' => 'colorhighfields.png', 'caption' => ' Highfields, looking at the window where the Lindbergh baby was kidnapped.', 'link' => 'https://www.sourland.org/history', 'linkText' => 'Image Source'])

                    </article>
            </div>
            <section class="mt-4">
                @include('content.highfields.footnotes')
            </section>
            <section class="mt-4">
                @include('content.highfields.references')
            </section>
            <section class="mt-4">
                @include('content.highfields.bibliography')
            </section>
        </div>
    </div>
@endsection


