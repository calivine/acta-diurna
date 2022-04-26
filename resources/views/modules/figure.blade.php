<figure>

    <img src="{{ asset('storage/assets/' . $imgSource . '.jpg') }}" alt="{{ $caption ?? '' }}">
    @if(isset($caption))
        <figcaption>
            {{ $caption }}@if(isset($link)) <a href="{{ $link }}">{{ $linkText }}</a>@endif
        </figcaption>
    @endif
</figure>
