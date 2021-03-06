<div class="modal fade" id="themeModal" tabindex="-1" role="dialog" aria-labelledby="changeThemeModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeThemeModal">Change Page Theme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('theme') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="input__wrapper">
                                <input type="radio" id="radio1" name="theme" value="light" {{ Cookie::get('theme') == 'light' ? 'checked' : '' }}>
                                <label for="radio1">Light</label>
                            </div>
                            <div class="input__wrapper">
                                <input type="radio" id="radio2" name="theme" value="dark" {{ Cookie::get('theme') == 'dark' ? 'checked' : '' }}>
                                <label for="radio2">Dark</label>
                            </div>
                            <div class="input__wrapper">
                                <input type="radio" id="radio3" name="theme" value="seasonal" {{ Cookie::get('theme') == 'seasonal' ? 'checked' : '' }}>
                                <label for="radio3">Dark (Spooky)</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input__wrapper">
                                <input type="radio" id="radio4" name="theme" value="dark-red" {{ Cookie::get('theme') == 'dark-red' ? 'checked' : '' }}>
                                <label for="radio4">Dark (Red)</label>
                            </div>
                            <div class="input__wrapper">
                                <input type="radio" id="radio5" name="theme" value="dark-green" {{ Cookie::get('theme') == 'dark-red' ? 'checked' : '' }}>
                                <label for="radio5">Dark (Green)</label>
                            </div>
                        </div>
                    </div>


                    <button type="submit">Save</button>
                </form>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
