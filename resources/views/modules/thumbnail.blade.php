<img src="{{ asset('storage/assets/' . $imgSource . '.jpg') }}" class="img-thumbnail" alt="{{ $caption ?? '' }}">
@if(isset($caption))
    <h4 class="text-center text-dark">{{ $caption }}</h4>
@endif
