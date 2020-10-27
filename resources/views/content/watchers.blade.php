@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <section>
                    <hgroup>
                        <h1 class="post__title">657 Boulevard, Westfield, NJ 07901</h1>
                        <h2 class="post__subtitle"><em>AKA “The Watcher” House: <br> The Truth Revealed?</em></h2>
                    </hgroup>

                    <figure>
                        <img src="{{ asset('storage/assets/watcher1.JPG') }}" alt="">

                        <figcaption>
                            Source:
                            https://www.nj.com/union/2017/10/judge_rules_on_njs_infamous_watcher_house_lawsuit.html
                        </figcaption>

                    </figure>
                    <article id="chainOfTitle">
                        <hgroup>
                            <h5>Chain of Title</h5>
                            <h5>657 Boulevard</h5>
                            <h5>1905-2019:</h5>
                        </hgroup>
                        <ol>
                            <li>1905-1914: Harry L. Russell</li>
                            <li>1914-07/051951: William H. Davies</li>
                            <li>07/05/1951- 8/26/1955: Dillard E. Bird</li>
                            <li>08/26/1955-08/02/1963: Lawrence & Mary Shaffer</li>
                            <li>07/23/1963-12/08/1990: Seth & Floy Lewis Bakes</li>
                            <li>11/28/1990-06/07/2014: John and Andrea Woods</li>
                            <li>05/29/2014-07/02/2019:Derek & Maria Broaddus</li>
                        </ol>
                    </article>
                    <article class="border-top border-dark mt-3 pt-4" id="introduction">
                        <p id="disclaimer">*Disclaimer: this is a theory based on conjecture, publicly available
                            records, the location and the nature of the letters. </p>
                        <p>If there is one thing in life that one must learn, it is that actions have consequences.
                            Perhaps not right away, nor are those consequences always apparent, but they exist. Once
                            something has been cast into the universe, it lingers and serves as a record or imprint in
                            time and space. The intention behind those actions can separate us between good and
                            evil.</p>
                        <p>In 2015, reports that something strange was happening to new homeowners in Westfield, NJ.
                            Someone sent mysterious letters to a young family with deeply unsettling messages about
                            their new residence and children, referenced as "young blood." The family purchased the
                            property in June 2014 and started receiving these letters shortly after that. The letters
                            appear to have ceased in 2017, and the family sold the house, having never lived in it.</p>
                        <p>The Watcher letters are disturbing. It appeared the house came with an apparent stalker or
                            someone obsessed with the property. There was a civil lawsuit, but the courts ultimately
                            dismissed it in 2019. The family sold the home at an approximately 30% loss the same year.
                            For one family, the experience they had in Westfield, NJ, was a terrifying nightmare playing
                            out in front of the world. And apparently, no one could solve it, or maybe no one wanted to.
                        </p>
                        <p>This is the story of the Westfield Watcher, an anonymous author of at least 4 bizarre and
                            disturbing letters to this young family, seemingly obsessed with, and possessing a deeper
                            knowledge of the house, and my obsession with finding out who wrote and sent those
                            letters…the truth may be the most frightening part of all. This story is a cautionary tale
                            of moving into a new neighborhood. No matter how safe you feel, you never really know the
                            history you're walking into. </p>
                        <p>To my knowledge the Westfield Watcher has never been publicly identified, but was possibly
                            right there the entire time. </p>
                        <p>The Broaddus family, Derek, his wife Maria, their three young children, purchased the $1.3M
                            home, 657 Boulevard in Westfield, NJ early summer 2014. It was their dream house, but
                            quickly turned into a real nightmare. If you’re not familiar with the story of the Watcher,
                            I recommend starting with this article
                            <a href="https://www.thecut.com/2018/11/the-haunting-of-657-boulevard-in-westfield-new-jersey.html">here</a>.
                            This is an analysis of the history of 657 Boulevard and the theory of who the potential
                            suspect of Westfield Watcher might be, not the details of the original case. </p>
                        <article class="border-top border-dark mt-3 pt-4">
                            <p>It all seemed too strange to be real, like something out of a horror movie. The letters
                                were unsettling and the Watcher seemed so close, there was an almost supernatural aura
                                to them. For the curious, this case was too intriguing not to dig deeper into and try to
                                solve. The result, however, sheds a light on how we think we know someone and how deep
                                roots in small communities can have drastic consequences. </p>
                        </article>
                    </article>
                    <article id="theFirstLetter">
                        <hgroup>
                            <h2 class="post__section-title">The First Letter</h2>
                            <h2 class="post__section-title">June 18, 2014</h2>
                        </hgroup>
                        <blockquote class="quote__letter">
                            <p>Dearest new neighbor at 657 Boulevard,</p>
                            <p>Allow me to welcome you to the neighborhood.</p>
                            <p>657 Boulevard has been the subject of my family for decades now and as it approaches its
                                110th birthday, I have been put in charge of watching and waiting for its second coming.
                                My grandfather watched the house in the 1920s and my father watched in the 1960s. It is
                                now my time. Do you know the history of the house? Do you know what lies within the
                                walls of 657 Boulevard? Why are you here? I will find out.</p>
                        </blockquote>
                        <p>The history of 657 Boulevard appears to be very important to the Watcher, so what made this
                            house so alluring?</p>
                        <h2 class="post__section-title">History of 657 Boulevard</h2>
                        <p>657 Boulevard is a part of Park Slope, a residential development established by the Westfield
                            Realty Improvement Company in 1904. It was built in 1905 and is a classic Dutch Colonial
                            Revival, a popular architectural style of the early 20th century. The house's most prominent
                            features are the gambrel facade and roof, asymmetry of the windows, and the front porch with
                            ionic columns. The front-facing, center gambrel roof-line was a popular feature in American
                            architecture roughly between 1895-1915, befitting for the era.</p>
                        @include('modules.figure', ['imgSource' => '657 Boulevard_street view.png', 'caption' => 'Image courtesy Google Maps/Street View accessed 10/20/2020'])
                        @include('modules.figure', ['imgSource' => 'sanbornMap2.png', 'caption' => '1909 Sanborn Insurance Map of Boulevard and Carleton Rd., Westfield, NJ657 Boulevard is highlighted in red.'])
                        @include('modules.figure', ['imgSource' => 'census.jpg', 'caption' => 'Here, in the 1910 federal census for Westfield, NJ notes the family at 657 Boulevard:'])
                        @include('modules.figure', ['imgSource' => 'news_article.jpg', 'caption' => 'The Courier-News(Bridgewater, New Jersey) Nov 1947, Mon Page 20', 'class' => 'aspect-ratio__point-eight'])
                    </article>
                    <article id="theSecondLetter">
                        <hgroup>
                            <h2 class="post__section-title">The Second Letter</h2>
                            <h2 class="post__section-title">July 18, 2014</h2>
                        </hgroup>
                        <blockquote class="quote__letter">
                            <p>657 Boulevard is anxious for you to move in. It has been years and years since the young
                                blood ruled the hallways of the house. Have you found all of the secrets it holds yet?
                                Will the young blood play in the basement? Or are they too afraid to go down there
                                alone? I would [be] very afraid if I were them. It is far away from the rest of the
                                house. If you were upstairs you would never hear them scream.</p>
                            <p>Will they sleep in the attic? Or will you all sleep on the second floor? Who has the
                                bedrooms facing the street? I’ll know as soon as you move in. It will help me to know
                                who is in which bedroom. Then I can plan better.</p>
                            <p>All of the windows and doors in 657 Boulevard allow me to watch you and track you as you
                                move through the house. Who am I? I am the Watcher and have been in control of 657
                                Boulevard for the better part of two decades now. The Woods family turned it over to
                                you. It was their time to move on and kindly sold it when I asked them to.</p>
                            <p>I pass by many times a day. 657 Boulevard is my job, my life, my obsession. And now you
                                are too Broaddus family. Welcome to the product of your greed! Greed is what brought the
                                past three families to 657 Boulevard and now it has brought you to me.</p>
                            <p>Have a happy moving in day. You know I will be watching.</p>
                        </blockquote>
                    </article>
                    <article id="theThirdLetter">
                        <hgroup>
                            <h2 class="post__section-title">The Third Letter</h2>
                            <h2 class="post__section-title">August 2014</h2>
                        </hgroup>
                        <blockquote class="quote__letter">
                            <p>657 Boulevard is turning on me. It is coming after me. I don’t understand why. What spell
                                did you cast on it? It used to be my friend and now it is my enemy. I am in charge of
                                657 Boulevard. It is not in charge of me. I will fend off its bad things and wait for it
                                to become good again. It will not punish me. I will rise again. I will be patient and
                                wait for this to pass and for you to bring the young blood back to me. 657 Boulevard
                                needs young blood. It needs you. Come back. Let the young blood play again like I once
                                did. Let the young blood sleep in 657 Boulevard. Stop changing it and let it alone.</p>
                        </blockquote>
                    </article>
                    <article id="theFourthLetter">
                        <hgroup>
                            <h2 class="post__section-title">The Fourth Letter</h2>
                            <h2 class="post__section-title">March 2017</h2>
                        </hgroup>
                        <blockquote class="quote__letter">
                            <p>You wonder who The Watcher is? Turn around idiots. Maybe you even spoke to me, one of the
                                so called neighbors who has no idea who The Watcher could be. Or maybe you do know and
                                are too scared to tell anyone. Good move. I walked by the news trucks when they took
                                over my neighborhood and mocked me. I watched as you watched from the dark house in an
                                attempt to find me … Telescopes and binoculars are wonderful inventions. 657 Boulevard
                                survived your attempted assault and stood strong with its army of supporters barricading
                                its gates. My soldiers of the Boulevard followed my orders to a T. They carried out
                                their mission and saved the soul of 657 Boulevard with my orders. All hail The
                                Watcher!!!</p>
                            <p>Maybe a car accident. Maybe a fire. Maybe something as simple as a mild illness that
                                never seems to go away but makes you fell sick day after day after day after day after
                                day. Maybe the mysterious death of a pet. Loved ones suddenly die. Planes and cars and
                                bicycles crash. Bones break.</p>
                        </blockquote>
                        @include('modules.figure', ['imgSource' => 'googleMapsView.png', 'caption' => '657 Boulevard and the house on Carleton behind it. Image courtesy Google Maps, accessed October 2020.'])

                    </article>
                    <article id="motiveMeansOpportunity">
                        <hgroup>
                            <h1 class="post__section-title">Motive, Means, and Opportunity - Was It The Neighbor On Carleton Road?</h1>
                        </hgroup>
                        @include('modules.figure', ['imgSource' => 'carltonRd.png', 'caption' => 'Street view from Carleton Rd. 657 Boulevard is in the background. Image via Google Maps'])
                        @include('modules.figure', ['imgSource' => 'carltonRd2.png', 'caption' => 'Zoomed view from Carleton Rd. 657 Boulevard is in the background. Image via Google maps.'])
                        @include('modules.figure', ['imgSource' => 'sanbornMap.png', 'caption' => 'Sanborn Insurance Map, 1921, Westfield, NJ. 657 Boulevard and the house on Carleton St. highlighted in red.'])
                        @include('modules.figure', ['imgSource' => 'carletonRdRealtorView.png', 'caption' => 'Interior view of the Carleton Rd. house, with 657 Boulevard in the background. Via Realtor.com'])
                    </article>
                </section>

            </div>
        </div>
    </div>
@endsection

