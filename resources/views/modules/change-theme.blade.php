<div class="modal fade" id="themeModal" tabindex="-1" role="dialog" aria-labelledby="changeThemeModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeThemeModal">Update Icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('theme') }}" method="POST">
                    @csrf
                    <div class="input__wrapper">
                        <input type="radio" id="radio1" name="theme" value="light" checked>
                        <label for="radio1">Light</label>
                    </div>
                    <div class="input__wrapper">
                        <input type="radio" id="radio2" value="dark" name="theme">
                        <label for="radio2">Dark</label>
                    </div>
                    <button type="submit">Save</button>
                </form>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
