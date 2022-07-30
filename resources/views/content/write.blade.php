@include('modules.toolbar')
<section class="container write-post-container">
    <div class="write-post-inner-container">
        <div class="editor">
            <form class="write-post-form" action="{{ route('post.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="text-input-container show-placeholder">
                    <span class="fr-placeholder">Write here to post...</span>
                    <div class="text-input-display" contenteditable="true"></div>
                    <textarea class="text-input" name="post" placeholder="Write post here..."></textarea>
                </div>
                <div class="text-input-container">
                    <button class="btn btn-primary" type="submit" name="save">Post</button>
                </div>
            </form>
        </div>
    </div>
</section>
