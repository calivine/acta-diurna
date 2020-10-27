<figure>
    <img class="{{ isset($class) ? $class : 'aspect-ratio__square' }}" src="{{ asset('storage/assets/' . $imgSource) }}" alt="{{ $caption }}">
    <figcaption>
        {{ $caption }}
    </figcaption>
</figure>
