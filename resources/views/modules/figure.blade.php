<figure>
    @if(\Illuminate\Support\Str::contains($imgSource, '.jpg'))
        <img src="{{ asset('storage/assets/' .  $imgSource) }}" alt="{{ $caption ?? '' }}" @if(isset($id)) data-img-id="{{ $id }}" @endif>
    @else
        <img src="{{ asset('storage/assets/' .  $imgSource . '.jpg') }}" alt="{{ $caption ?? '' }}" @if(isset($id)) data-img-id="{{ $id }}" @endif>
    @endif

    @if(isset($caption))
        <figcaption>
            {{ $caption }}@if(isset($link)) <a href="{{ $link }}">{{ $linkText ?? '' }}</a>@endif
        </figcaption>
    @endif
</figure>
