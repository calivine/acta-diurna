@include('modules.toolbar')
<section class="container write-post__container">
    <div class="write-post__inner-container">
        <div class="editor">
            <form class="write-post__form" action="{{ route('post.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="text-input__container show-placeholder">
                    <span class="fr-placeholder">Write here to post...</span>
                    <div class="text-input__display" contenteditable="true"></div>
                    <textarea class="text-input" name="post" placeholder="Write post here..."></textarea>
                </div>
                <div class="text-input__container">
                    <button class="btn btn-primary" type="submit" name="save">Post</button>
                </div>
            </form>
        </div>
    </div>
</section>
