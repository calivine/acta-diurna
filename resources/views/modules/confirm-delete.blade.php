<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModal">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="confirm-delete">
                    <p>Are you sure you want to delete?</p>

                    <form action="{{ route($route, $param) }}" method="POST">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    <a href="{{ route('home') }}">Cancel</a>
                </section>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
