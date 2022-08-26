<div class="edit-image-container">
    <div class="edit-image-button">
        <button class="btn btn-link" data-toggle="modal" data-target="{{ '#confirm-delete-img-modal-' . $loop->iteration }}">Delete
            Image
        </button>
    </div>
    <div class="edit-image-img">
        @include('modules.figure', ['imgSource' => $image->filename])
    </div>
    <div class="edit-image-form">
        <form action="{{ route('podcasts.images.update', [$podcast->id, $image->id]) }}" class="p-3 md-14" method="POST"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <label for="{{ 'photo-' . $loop->iteration . '-caption' }}" class="mb-0">Caption</label>
                <input type="text" id="{{ 'photo-' . $loop->iteration . '-caption' }}"
                       class="form-control mb-0" name="caption" value="{{ $image->caption ?? "" }}">
            </div>
            <button class="" type="submit">Save</button>
        </form>
    </div>
    @include('modules.confirm-delete', ['modalId' => 'confirm-delete-img-modal-' . $loop->iteration, 'param' => $image->id, 'route' => 'images.destroy'])
</div>
