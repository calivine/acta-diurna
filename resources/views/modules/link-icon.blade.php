
<li class="icon {{ $name }}">
    <span class="tooltip"> @if(isset($tooltip)) {{ $tooltip }} @else {{ ucfirst($name) }} @endif </span>
    <span>
        <a href="{{ $source }}"><img src="{{ asset('storage/assets/' . $icon) }}" alt="" class=""></a>
    </span>
</li>