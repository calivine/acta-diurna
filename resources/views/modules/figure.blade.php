<figure>
    <a href="{{ asset('storage/assets/' . $imgSource . '.jpg') }}">
        <img src="{{ asset('storage/assets/' . $imgSource . '.jpg') }}" alt="{{ $caption ?? '' }}">
    </a>
    @if(isset($caption))
        <figcaption>
            {{ $caption }}@if(isset($link)) <a href="{{ $link }}">{{ $linkText }}</a>@endif
        </figcaption>
    @endif
</figure>
