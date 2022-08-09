<div class="container-fluid">
    <!-- Form to create a new podcast episode. -->
    <form class="p-3 md-14" action="{{ route('podcasts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="mb-0" for="podcast-title">Title</label>
        <input type="text" id="podcast-title" class="form-control mb-0" name="title" required>
        <p class="p-0 m-0 text-right">250 Character Max</p>
        <label for="podcast-description" class="mb-0">Description</label>
        <textarea name="description" id="podcast-description" cols="25" rows="10"
                  class="px-0 form-control mt-0"></textarea>
        <label for="podcast-rss" class="mb-0">RSS Link</label>
        <input type="text" id="podcast-rss" class="px-0 form-control mb-3 mt-0" name="rss" required>
        <div class="row">
            <div class="col-md-6">
                <label for="podcast-season" class="mb-0">Season</label>
                <input type="number" id="podcast-season" class="px-0 form-control mb-3" name="season" required>
            </div>
            <div class="col-md-6">
                <label for="podcast-episode" class="mb-0">Episode</label>
                <input type="number" id="podcast-episode" class="px-0 form-control mb-3 mt-0" name="episode" required>
            </div>
        </div>
        <label for="podcast-published" class="mb-0">Published Date</label>
        <input type="date" id="podcast-published" class="px-0 form-control mb-3 mt-0" name="published" required>
        <div class="row">
            <div class="box">
                <div class="box__input">
                    <input class="box__file" type="file" name="uploadFile" id="file"
                           data-multiple-caption="{count} files selected"/>
                    <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                </div>
            </div>

        </div>
        <button class="" type="submit">Upload</button>
    </form>
</div>

