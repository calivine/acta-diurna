<figure>
    <img src="{{ asset('storage/assets/' . $imgSource) }}" alt="{{ $caption }}">
    <figcaption>
        {{ $caption }}@if(isset($link)) <a href="{{ $link }}">{{ $linkText }}</a>@endif
    </figcaption>
</figure>
