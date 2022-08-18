@foreach($podcasts as $podcast)
    <div class="row">
        <div class="col-lg-4 mx-auto my-5">
            @isAdmin
            <span class="admin-container">
                            <a href="{{ route('podcasts.edit', $podcast->id) }}" class="admin-item">Edit Podcast</a>

                        </span>
            @endisAdmin
            <a href="{{ route('getPodcast', $podcast->episode) }}" class="text-decoration-none">
                @include('modules.thumbnail', ['imgSource' => $podcast->thumbnail, 'caption' => 'S0' . $podcast->season . ' E0' . $podcast->episode . ': ' . $podcast->title])
            </a>
        </div>
    </div>
@endforeach
