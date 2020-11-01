@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">October 31, 2020</p>
                <section>
                    <hgroup>
                        <h1 class="post__title">657 Boulevard Westfield, NJ</h1>
                        <h1 class="post__subtitle"><em>AKA “The Watcher” House: <br> The Truth Revealed?</em></h1>
                    </hgroup>
                    <article id="chainOfTitle">
                        @include('modules.figure', ['imgSource' => 'watcher1_4-3.jpg', 'caption' => '6/25/15 Photo by John \'O Boyle for NJ Advance Media', 'link' => 'https://www.nj.com/union/2017/10/judge_rules_on_njs_infamous_watcher_house_lawsuit.html', 'linkText' => 'Original Source'])
                        <hgroup>
                            <h2 class="post__section-title">Chain of Title</h2>
                            <h5 class="post__section-title">657 Boulevard</h5>
                            <h5 class="post__section-title">1905-2019:</h5>
                        </hgroup>
                        <ol>
                            <li>1905 - 1914: Harry L. Russell</li>
                            <li>07/1914 - 05/1951: William H. Davies</li>
                            <li>07/05/1951 - 08/26/1955: Dillard E. Bird</li>
                            <li>08/26/1955 - 08/02/1963: Lawrence & Mary Shaffer</li>
                            <li>07/23/1963 - 12/08/1990: Seth & Floy Lewis Bakes</li>
                            <li>11/28/1990 - 06/07/2014: John & Andrea Woods</li>
                            <li>05/29/2014 - 07/02/2019: Derek & Maria Broaddus</li>
                        </ol>
                        <p id="disclaimer">*Disclaimer: this is a theory based on conjecture, publicly available
                            records, the location and the nature of the letters. </p>
                    </article>
                    <img class="border-fancy" src="{{ asset('storage/assets/fancyBorder1-noBG.png') }}" alt="">
                    <article id="introduction">
                        <p>If there is one thing in life that one must learn, it is that actions have consequences.
                            Perhaps not right away, nor are those consequences always apparent, but they exist. Once
                            something has been cast into the universe, it lingers and serves as a record or imprint in
                            time. The intention behind those actions can separate us between good and evil. </p>
                        <p> In 2015, something strange was happening to new homeowners in Westfield, NJ. Someone sent
                            mysterious letters to a young family with deeply unsettling messages about their new
                            residence and children, referred to as "young
                            blood."@include('modules.footnote', ['number' => '1']) The family purchased the property in
                            June 2014 and started receiving these letters shortly after that. The letters ceased in
                            2017, and the house was sold, having never been occupied by its owners.</p>
                        <p>For the Broaddus family, the experience they had in Westfield, NJ, was a terrifying nightmare
                            playing out in front of the world. It appeared the house came with a stalker or someone
                            obsessed with the property. There was a civil lawsuit, but the courts ultimately dismissed
                            it in 2019.@include('modules.footnote', ['number' => '2']) The family sold the home at an
                            approximately 30% loss the same year. It appeared
                            no one could solve it, or perhaps no one wanted to.
                        </p>

                        <p>The Westfield Watcher story, an anonymous author of at least four bizarre and disturbing
                            letters to a young family between 2014-2017. The Watcher appeared obsessed with the house on
                            Boulevard and had in-depth knowledge of the history. To find out more about 657 Boulevard's
                            history, I accidentally stumbled upon a new suspect, who may have written and sent those
                            letters. The truth may be the most frightening part of all. This story is a cautionary tale
                            of moving into a new neighborhood. No matter how safe you feel, you never really know the
                            history you're walking in on. </p>
                        <p>The Broaddus family, Derek, his wife Maria, their three young children, purchased the $1.3M
                            home, 657 Boulevard in Westfield, NJ, in early summer 2014. If you're not familiar with the
                            Watcher's story, I recommend starting with this article from The Cut in 2018
                            <a href="https://www.thecut.com/2018/11/the-haunting-of-657-boulevard-in-westfield-new-jersey.html">here</a>.
                            I will document and analyze 657 Boulevard's history and present a new theory, not reiterate
                            the original case's details.
                        </p>
                        <img class="border-fancy" src="{{ asset('storage/assets/fancyBorder1-noBG.png') }}" alt="">
                        <article class="mt-3 pt-4">
                            <p>It seemed too strange to be real, like something out of a horror movie. The letters were
                                unsettling, and the Watcher seemed so close, there was an almost supernatural aura to
                                them. For the curious, this case was too intriguing not to dig deeper into and try to
                                solve. However, the result sheds light on how we think we know someone and how deep
                                roots in small communities can have drastic consequences. </p>
                        </article>
                    </article>
                    <article id="theFirstLetter">
                        @include('content.thewatcher.letter1')
                        <p>The history of 657 Boulevard appears to be very important to the Watcher, so what made this
                            house so alluring?</p>
                    </article>
                    <article id="historyOf675Boulevard">
                        <h2 class="post__section-title">History of 657 Boulevard</h2>
                        <p>657 Boulevard is a part of Park Slope, a residential development established by the Westfield
                            Realty Improvement Company in 1904.@include('modules.footnote', ['number' => '3']) It was
                            built in 1905 and is a classic Dutch Colonial
                            Revival, a popular architectural style of the early 20th century. The house's most prominent
                            features are the gambrel facade and roof, asymmetry of the windows, and the front porch with
                            ionic columns. The front-facing, center gambrel roof-line was a popular feature in American
                            architecture roughly between 1895-1915, befitting for the
                            era.@include('modules.footnote', ['number' => '4'])</p>
                        @include('modules.figure', ['imgSource' => '657 Boulevard_street view4-3.jpg', 'caption' => 'Image via Google Maps/Street View accessed 10/20/2020'])
                        <p>From the outside, it is a beautiful example of early 20th century domestic architecture and a
                            reminder of Gilded Age wealth in America. Boulevard is a quiet, unassuming tree-lined
                            street, with large and well-kept houses and yards. It is seemingly a perfect street, in an
                            ideal home, in a peaceful neighborhood, approximately 16 miles from New York City. It
                            appears that in Westfield, NJ, Boulevard was the street to live on.</p>
                        @include('modules.figure', ['imgSource' => 'sanbornMap_Square.jpg', 'caption' => '1909 Sanborn Insurance Map of Boulevard and Carleton Rd., Westfield, NJ-657 Boulevard is highlighted in red.'])
                        <p>The original owner of 657 Boulevard was Harry Lincoln Russell, a real estate agent, and his
                            family between 1905-1914. Russell was an early property developer in Westfield. The next
                            owners of 657 Boulevard were the Davies family, purchasing the property in 1914. They would
                            be the most prominent and most prolonged owners, with William H. Davies becoming mayor of
                            Westfield in 1933 while living on Boulevard. He also died there in 1947 (as did his
                            mother-in-law in 1915 and his wife in 1943). </p>
                        @include('modules.figure', ['imgSource' => 'news_article.jpg', 'caption' => 'November 10, 1947 clipping from The Courier-News, Bridgewater New Jersey.'])
                        <p>Davies then passed 657 Boulevard to his son, Ernest Davies, and his family. Ernest sold it to
                            Dillard E. Bird in 1951. A Westfield trend of property transferred for $1 and 657 Boulevard
                            was no exception to this tradition until 1990 when the Bakes family sold the property to the
                            Woods. After the Bird family, the house sold three more times: Schaffer (1955-1963), Bakes
                            (1963-1990) and Woods (1990-2014), before being purchased by the
                            Broaddus’ in 2014.</p>
                    </article>
                    <article id="theSecondLetter">
                        @include('content.thewatcher.letter2')
                        <p>The second letter the family received, a month after the first, was much longer and much more
                            unsettling than the first. What was the Watcher planning? Why call children "young blood?"
                            Why would you track someone in their own home unless there was a nefarious motive? </p>
                        <p>Taking a step back, If you just purchased a new home and started receiving letters like this,
                            how would you feel?</p>
                        <p>The Watcher deeply unsettled the Broaddus family after they received these anonymous letters.
                            As it turned out, the family they purchased 657 Boulevard from, the Woods, also received a
                            strange letter but didn't think much of it and threw it away.</p>
                        <p>Unfortunately, the story of the Watcher took an unfortunate turn that had real-life
                            consequences. In 2015, the Broaddus family sued the Woods family. They would have never
                            purchased 657 Boulevard had they known about the "Watcher."</p>
                        <p>The Broaddus family went to the police. Then Detective Lieutenant Leonard Lugo, later demoted
                            to Sergeant in 2018 and now retired, informed the Broaddus family to stay silent on the
                            letters.@include('modules.footnote', ['number' => '5']) Unfortunately, the police were
                            unable to solve the case. The Broaddus family turned
                            to alternative security measures for protection, installing expensive security equipment,
                            and advertising for a personal security guard. The family was frightened due to the letters.
                            Now expenses were accruing for the family as well.</p>
                        <p>
                            There was some speculation on neighbors. It was explicitly focusing on another house on
                            Boulevard. Peggy Langford lived in the house next to 657 Boulevard. She had been there since
                            the mid-1960s. According to neighbors, she was in her 90s and shared the home with several
                            of her children. They were in their 60s and seemingly a bit eccentric. Her family was
                            considered suspects but cleared when DNA taken from one of the Watcher letters did not match
                            anyone in the family. The DNA found was to be
                            female.@include('modules.footnote', ['number' => '6']) Peggy Langford passed away in
                            February
                            2020.@include('modules.footnote', ['number' => '7'])

                        </p>
                    </article>
                    <article id="theThirdLetter">
                        @include('content.thewatcher.letter3')
                        <p>Now stuck with a house with someone claiming to be the "Watcher," literally watching them,
                            the family tried to look for options to recuperate some of their expenses. They tried to
                            take the house, situated on two lots, down and subdivide the property. The city of Westfield
                            ultimately denied this in January 2017.</p>

                    </article>
                    <article id="theFourthLetter">
                        @include('content.thewatcher.letter4')
                        <p>These letters became more unsettling and unhinged and possibly threatening. Who is this
                            person? Why are they doing this? Why are they explicitly referencing and calling out the
                            children specifically? Who would be obsessed
                            enough with this house to do such an odd thing? <br> I started by looking for clues within
                            the Watcher letters themselves. Ultimately, I believe the Watcher self-identifies themselves
                            in the 4th letter: <em>“Turn around idiots.”</em></p>
                        <p>There were several areas of interest observed within the letters:</p>
                        <ul>
                            <li>This person seems to have a deep connection with Westfield and 657 Boulevard, perhaps
                                even having close personal ties to the residence at some point in time.
                            </li>
                            <li>They appear to be older...with some phrasing that seems to come out of an old Hollywood
                                movie “move about the house” and “let it alone” reminds me of someone who peaked in the
                                1960s.
                            </li>
                            <li>This person also seems to be intensely jealous of the wealthy and may potentially suffer
                                from underlying mental illness.
                            </li>
                        </ul>
                        @include('modules.figure', ['imgSource' => 'googleMapsView_4-3.jpg', 'caption' => '657 Boulevard and the house on Carleton behind it. Image courtesy Google Maps, accessed October 2020.'])

                    </article>
                    <article id="motiveMeansOpportunity">
                        <hgroup>
                            <h1 class="post__section-title">Motive, Means, and Opportunity - Was It The Neighbor On
                                Carleton Road?</h1>
                            <p id="disclaimer">*Street number for Carleton Rd.  will not be provided for this article. </p>
                            <p id="disclaimer">**Please note, the new residents of Carleton Rd. are not involved in this case.
                            </p>
                        </hgroup>
                        <p>The suspected Watcher appears to have lived on the street parallel to Boulevard - **Carleton
                            Rd. on the lot directly behind 657 Boulevard. From there, access to 657 Boulevard's backyard
                            and driveway are in clear, full view from this spot.</p>
                        <p>Is this where the Westfield Watcher lived until 2017? A family lived here for nearly 50 years
                            before selling it to an LLC in 2017.@include('modules.footnote', ['number' => '8']) It sold
                            to a couple in 2019.@include('modules.footnote', ['number' => '9']) You can see 657
                            Boulevard
                            from Carleton Rd.</p>

                        @include('modules.figure', ['imgSource' => 'carletonRd4-3.jpg', 'caption' => 'Street view from Carleton Rd. 657 Boulevard is in the background. Image via Google Maps'])
                        @include('modules.figure', ['imgSource' => 'carltonRd2_4-3.jpg', 'caption' => 'Zoomed view from Carleton Rd. 657 Boulevard is in the background. Image via Google maps.'])
                        <p>The house is stucco-clad, in a Colonial Revival style built around 1920. While lovely, the
                            homes on Carleton are not as grand as the homes on Boulevard. Between the house on Carleton
                            and 657 Boulevard, there are approximately 114 feet between them. Records indicate
                            Carleton's
                            owners had been there since September 1970 and sold the house in June 2017 to a newly formed
                            LLC.@include('modules.footnote', ['number' => '10']) That
                            means this couple was living at this house on Carleton when the Watcher was sending the
                            letters. The couple living there were in their late 80s.
                        </p>
                        <p>That couple raised ten children at the house on Carleton Rd., the one behind 657 Boulevard.
                            Their children went to Westfield High School and today are grown with families of their own.
                            <br> One interesting fact that is never mentioned, nor is apparent, is that one of their
                            daughters married one of Seth and Floy Bakes' sons in
                            1982.@include('modules.footnote', ['number' => '11']) The Bakes family lived in 657
                            Boulevard between 1963-1990. It was the Bakes who sold the house to the Woods. For a time,
                            the Bakes and the family on Carleton road overlapped.</p>
                        <p>That suggests the house owners on Carleton would have had access to 657 Boulevard for nearly
                            a decade, if not longer, and a personal connection if her son-in-law grew up there. The
                            house's matriarch on Carleton road had likely been a frequent guest of 657 Boulevard in the
                            past. She also grew up in Westfield; her family had been there possibly as early as the
                            1920s.</p>
                        <p>Online realtor photographs indicate a clear view of 657 Boulevard from the house's backyard
                            on Carleton road You can easily see all of the back windows, the sunroom, the back entrance,
                            the driveway. The physical distance between the houses is 114 feet, or 38 yards. You could
                            probably hear and see quite a lot. In some reports regarding the Watcher, contract workers
                            at 657 Boulevard claimed the backyard neighbors had lawn chairs facing 657 Boulevard as if
                            watching it.@include('modules.footnote', ['number' => '12']) </p>
                        @include('modules.figure', ['imgSource' => 'sanbornMap_Square.jpg', 'caption' => 'Sanborn Insurance Map, 1921, Westfield, NJ. 657 Boulevard and the house on Carleton Rd. highlighted in red.'])
                        @include('modules.figure', ['imgSource' => 'carletonRdRealtorViewSquare.jpg', 'caption' => 'Interior view of the Carleton Rd. house, with 657 Boulevard in the background. Image courtesy Realtor.com ', 'link' => 'https://www.realtor.com/realestateandhomes-detail/644-Carleton-Rd_Westfield_NJ_07090_M67589-13330#photo8', 'linkText' => 'Original Source'])
                        <p>The fourth Watcher letter also clearly states, "Turn around, idiots," as if living behind 657
                            Boulevard the entire time.</p>
                        @include('modules.figure', ['imgSource' => '657BoulevardZillow4-3.jpg', 'caption' => 'Back entrance to 657 Boulevard. Image courtesy Zillow.', 'link' => 'https://www.zillow.com/homedetails/657-Boulevard-Westfield-NJ-07090/40090611_zpid/?mmlb=g,5', 'linkText' => 'Original Source'])
                        <p>The Watcher's MMO:</p>
                        <dl>
                            <dt>Means</dt>
                            <dd>Knowledge/History, proximity to 657 Boulevard</dd>
                            <dt>Motive</dt>
                            <dd>Lifelong Westfield community member, jealousy, curiosity, mental illness, cognitive
                                decline?
                            </dd>
                            <dt>Opportunity</dt>
                            <dd>Location, backyard neighbor</dd>
                        </dl>
                        <p>It is not clear why the police didn't investigate the owners of Carleton as suspects. Perhaps
                            it was because they are elderly and don't seem to fit any profile? The owners also seem to
                            be pillars of the community, with a large, local family.<br><br>In 2018 the police demoted
                            the original Detective on the Watcher case. Perhaps the police overlooked all the small
                            details?</p>
                        <p>It appears that the Watcher could be an elderly jealous neighbor, with deep, life-long ties
                            to the community and perhaps a life-long obsession with the beautiful house on Boulevard.
                            Maybe she was suffering from forms of dementia, senility, or something along those lines
                            that flawed reasoning? The backyard neighbors had a family connection to 657 Boulevard by
                            way of their daughter and son-in-law, visibility, and 657 Boulevard access. The creepiest
                            part, referencing things that could only be known, had the Watcher been within earshot.</p>
                        <p>Due to the Watcher's activities, the family was tormented publicly and terrorized. The
                            Watcher added to financial stresses. With three children, it must have taken a huge
                            emotional and distressing toll on the parents</p>
                        <p>They sold the property at a 30% loss, and there were lawsuits. The Broaddus family's
                            estimated damages are at least $1M or more: $400K loss on the property, lawsuit fees $200K
                            (est.) plus an additional $400K+ for any other costs and fees accrued between June
                            2014-Present. We never see the financial impact a simple thing like writing an anonymous
                            letter would have, but there it is, essentially.</p>
                        <p>How many people in Westfield knew who might have been sending the letters this whole time?
                            Why did they stay quiet? The Watcher indicates that people should be scared of them.
                            Why?<br>How did the police miss this?<br><br><em>You wonder who The Watcher is? Turn around
                                idiots. Maybe you even spoke to me, one of the so called neighbors who has no idea who
                                The Watcher could be. Or maybe you do know and are too scared to tell anyone. Good
                                move.</em><br><br>If the Watcher saw the Broaddus family as outsiders in Westfield, they
                            were perhaps doomed when they purchased the house.<br><br>Individuals such as the Watcher
                            forget that there are real-life consequences to their actions. Some of us are merely seeking
                            the truth. We want justice for the negative things that impact innocent members of society.
                            Actions ripple deeply throughout the community. The public will remember 657 Boulevard as
                            the "Watcher House" forever.<br><br>At the end of it all, only the Westfield Watcher knows
                            the truth. Unfortunately, this story could have happened to anyone. If it weren't the
                            Broaddus family that purchased 657 Boulevard, perhaps some other family would live in terror
                            by the Watcher. Hopefully, this insight highlights a potential suspect and brings some peace
                            to the Broaddus family. Maybe the police can finally solve the Watcher mystery.
                        </p>
                        <p>I encourage you to draw your own conclusions.</p>
                        <p class="post__section-title">Happy Halloween!</p>
                    </article>
                </section>
                <section class="mt-4">
                    @include('content.thewatcher.footnotes')
                </section>
            </div>
        </div>
    </div>
@endsection

