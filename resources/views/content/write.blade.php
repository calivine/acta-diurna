<section class="container post-container">
    <div class="post-editorContainer">
        <div class="editor">
            <form class="post-form" action="{{ route('post.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-container show-placeholder">
                    <span class="fr-placeholder">Write here to post...</span>
                    <div class="text-input-display" contenteditable="true">
                        <span class="upload-label">Drop in a file to start uploading it.</span>
                    </div>
                    <textarea class="text-input" name="post" placeholder="Write post here..."></textarea>
                </div>
                <div class="input-container">
                    <button class="btn btn-success" type="submit" name="save">Post</button>
                </div>
            </form>
            @include('modules.upload')
        </div>
    </div>
</section>
