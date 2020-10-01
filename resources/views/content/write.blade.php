<section class="container post-container">
    <div class="post-editorContainer">
        <div class="toolbar-container">
            <button type="button" id="cold" class="toolbar-button">C</button>
            <button type="button" id="bold" class="toolbar-button">B</button>
            <button type="button" id="aold" class="toolbar-button">A</button>
        </div>
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
            <form class="box hidden" action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box__input">
                    <input class="box__file" type="file" name="uploadFile" id="fileHidden" data-multiple-caption="{count} files selected" multiple />
                    <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                    <button class="box__button" type="submit">Upload</button>
                </div>
                <div class="box__success">Done!</div>
                <div class="box__error">Error! <span></span>.</div>
            </form>
            <div class="box__uploading" id="upload-display">Uploading...<span id="progress-bar"></span></div>
        </div>
    </div>
</section>
