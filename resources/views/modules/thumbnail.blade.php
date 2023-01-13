@if(\Illuminate\Support\Str::contains($imgSource, '.jpg'))
    <img src="{{ asset('storage/assets/' . $imgSource) }}" class="img-thumbnail" alt="{{ $caption ?? '' }}">

@else
    <img src="{{ asset('storage/assets/' . $imgSource . '.jpg') }}" class="img-thumbnail" alt="{{ $caption ?? '' }}">
@endif

@if(isset($caption))
    <h4 class="text-center img_text">{{ $caption }}</h4>
@endif
