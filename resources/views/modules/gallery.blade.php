@foreach($files as $file)
    <div class="media">
        <a href="{{ route('watch', ['hash' => $file->hash]) }}"><img src="{{ asset('storage/gifs/' . $file->gif->path) }}" class="img-thumbnail rounded float-left"></a>
    </div>
@endforeach
{{ $files->links() }}
