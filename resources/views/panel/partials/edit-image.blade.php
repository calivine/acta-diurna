<div class="edit-image-container" draggable="true">
    <div class="edit-image-inner-container">
        <div class="edit-image-button-container">
            <div class="edit-image">
                {{ $loop->iteration - 1 }}
            </div>
            <div class="edit-image-button">
                <button class="btn btn-link" data-toggle="modal"
                        data-target="{{ '#confirm-delete-img-modal-' . $loop->iteration }}">Delete
                    Image
                </button>
            </div>
        </div>
        <div class="edit-image-form-container">
            <div class="edit-image-img">
                @include('modules.figure', ['imgSource' => $image->filename, 'id' => $image->id])
            </div>
            <div class="edit-image-form">
                <form action="{{ route('podcasts.images.update', [$podcast->id, $image->id]) }}" method="POST"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <span>
                        <label for="{{ 'photo-' . $loop->iteration . '-caption' }}" class="mb-0">Caption</label>
   
                        <!-- <i class="fa-solid fa-spinner fa-spin-pulse"></i> -->
                    </span>

                    <div class="edit-image-input-container">
                        <input type="text" id="{{ 'photo-' . $loop->iteration . '-caption' }}" name="caption"
                               value="{{ $image->caption ?? "" }}">
                        <button class="" type="submit">Save</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

    @include('modules.confirm-delete', ['modalId' => 'confirm-delete-img-modal-' . $loop->iteration, 'param' => $image->id, 'route' => 'images.destroy'])
</div>
