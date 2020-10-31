<div id="imageGallery" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            @include('modules.figure', ['imgSource' => 'The_Courier_News_Tue__Jan_5__1943_.jpg', 'caption' => 'A clipping from the Courier-News, Bridgewater, New Jersey, Tuesday, January 5, 1943 pg. 19'])
        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'The_Courier_News_Sat__Aug_23__1952_.jpg', 'caption' => 'A clipping from the Courier-News, Bridgewater, New Jersey, Saturday, August 23, 1952'])
        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'The_Courier_News_Sat__Oct_24__1959_.jpg', 'caption' => 'A clipping from the Courier-News, Bridgewater, New Jersey, Saturday, October 24, 1959 pg. 12'])
        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'peggyLangford.png', 'caption' => 'Photo via Ancestry.com, shared by Abigail Langford on May 4, 2019. Peggy Langford as a young woman. She appears to have moved to NJ in the 1950s and lived on Boulevard since the 1960s. She was originally from Kansas City, MO. Members of her family were publicly accused of being the Watcher in 2015. DNA evidence cleared the family. Peggy passed away in February 2020. '])
        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'CubberlyObit.jpg', 'caption' => 'Newspaper clipping from the Courier-News, Bridgewater, New Jersey, Saturday, December 18, 1915 pg.6'])
        </div>
        <figure class="carousel-item">
            <img src="{{ asset('storage/assets/census.jpg') }}" alt="">
            <figcaption>
                <ul>
                    <li>Harry L. Russell, Head, 42. Occupation, Agent, Real Estate</li>
                    <li>Anna Russell, Wife, 39</li>
                    <li>Gladys M Russell, daughter, 18</li>
                    <li>Aubrey J Russell, son, 14</li>
                    <li>Alice M. Sadler, Mother-in-law, 64</li>
                    <li>Annie Gurney, Servant, 20</li>
                </ul>
            </figcaption>
        </figure>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => '657 Boulevard_street view4-3.jpg', 'caption' => 'Image via Google Maps/Street View accessed 10/20/2020'])
        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => '657BoulevardZillow4-3.jpg', 'caption' => 'Back entrance to 657 Boulevard. Image courtesy Zillow.', 'link' => 'https://www.zillow.com/homedetails/657-Boulevard-Westfield-NJ-07090/40090611_zpid/?mmlb=g,5', 'linkText' => 'Original Source'])
        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'carletonRd4-3.jpg', 'caption' => 'Street view from Carleton Rd. 657 Boulevard is in the background. Image via Google Maps'])

        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'carltonRd2_4-3.jpg', 'caption' => 'Zoomed view from Carleton Rd. 657 Boulevard is in the background. Image via Google maps.'])

        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'carletonRdRealtorViewSquare.jpg', 'caption' => 'Interior view of the Carleton Rd. house, with 657 Boulevard in the background. Image courtesy Realtor.com ', 'link' => 'https://www.realtor.com/realestateandhomes-detail/644-Carleton-Rd_Westfield_NJ_07090_M67589-13330#photo8', 'linkText' => 'Original Source'])

        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'sanbornMap_Square.jpg', 'caption' => '1909 Sanborn Insurance Map of Boulevard and Carleton Rd., Westfield, NJ-657 Boulevard is highlighted in red.'])
        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'sanbornMap_Square.jpg', 'caption' => 'Sanborn Insurance Map, 1921, Westfield, NJ. 657 Boulevard and the house on Carleton Rd. highlighted in red.'])
        </div>
        <div class="carousel-item">
            @include('modules.figure', ['imgSource' => 'parkSlope.jpg', 'caption' => '1904 Map of Slope Park, Westfield, NJ'])
        </div>
    </div>
    <a class="carousel-control-prev" href="#imageGallery" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#imageGallery" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
