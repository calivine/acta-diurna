<div class="form__wrapper" id="display__podcasts">
    <div class="container-fluid">
        <form class="p-3 md-14" method="POST" action="#">
            @csrf
            <label class="mb-0" for="podcast-title">Title</label>
            <input type="text" id="podcast-title" class="form-control mb-3" name="title" required>

        </form>
    </div>
</div>
