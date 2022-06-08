<figure>
    @if(\Illuminate\Support\Str::contains($imgSource, '.jpg'))
        <img src="{{ asset('storage/assets/' .  $imgSource) }}" alt="{{ $caption ?? '' }}">
    @else
        <img src="{{ asset('storage/assets/' .  $imgSource . '.jpg') }}" alt="{{ $caption ?? '' }}">
    @endif

    @if(isset($caption))
        <figcaption>
            {{ $caption }}@if(isset($link)) <a href="{{ $link }}">{{ $linkText ?? '' }}</a>@endif
        </figcaption>
    @endif
</figure>
