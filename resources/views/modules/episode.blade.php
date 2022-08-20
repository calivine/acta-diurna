<div class="episode-container">
    <h1>{{ $podcast->title }} | {{ $podcast->season }} {{ $podcast->episode }}</h1>
    {{ $podcast->published }}
    <div class="col-lg-4 mx-auto my-5">
        <a href="{{ url('/podcasts/' . $podcast->id) }}" class="text-decoration-none">
            @include('modules.thumbnail', ['imgSource' => $podcast->thumbnail, 'caption' => $podcast->title])
        </a>
    </div>
</div>
