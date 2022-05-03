<div class="row">
    {{ $date }}
    <div class="col-lg-4 mx-auto my-5">
        <a href="{{ url('/podcasts/' . $id) }}" class="text-decoration-none">
            @include('modules.thumbnail', ['imgSource' => $filename, 'caption' => $title])
        </a>
    </div>
</div>
