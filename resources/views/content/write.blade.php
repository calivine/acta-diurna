<section class="container write-post__container">
    <div class="write-post__inner-container">
        <div class="editor">
            <form class="write-post__form" action="{{ route('post.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="text-input__container show-placeholder">
                    <span class="fr-placeholder">Write here to post...</span>
                    <span class="upload-label">Drop in a file to start uploading it.</span>
                    <div class="text-input__display" contenteditable="true">
                    </div>
                    <textarea class="text-input" name="post" placeholder="Write post here..."></textarea>
                </div>
                <div class="text-input__container">
                    <button class="btn btn-red-gradient" type="submit" name="save">Post</button>
                </div>
            </form>
            @include('modules.upload')
        </div>
    </div>
</section>
