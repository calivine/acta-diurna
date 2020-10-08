@isset($files)
    @foreach($files as $file)
        <div class="media">
            <a class="video__link" href="{{ route('watch', ['hash' => $file->hash]) }}"><img
                        src="{{ asset('storage/gifs/' . $file->gif->path) }}" alt="{{ $file->filename }}"
                        class="img-thumbnail rounded float-left"></a>
        </div>
    @endforeach
@endisset


<div class="page-navigation__container">
    {{-- {{ $files->links() }} --}}
</div>


