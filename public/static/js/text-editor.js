document.addEventListener('DOMContentLoaded', function () {
    let textInput = document.querySelector('.text-input');
    let uploadsResultsContainer = $('.upload-results-container');
    let textView = document.querySelector('.text-input-display');
    let form = document.querySelector('.post-form');
    let uploadingDisplay = $('#upload-display');
    let textUpload = $('.text-input__display');
    let editableContentBox = document.querySelector('.text-input-display');
    const hiddenForm = $('.box.hidden');
    const uploadLabel = $('.upload-label');
    const inputContainer = $('.text-input__container.show-placeholder');
    let drFiles = false;

    if (isAdvancedUpload) {
        textUpload.addClass('has-advanced-upload');
        console.log('Drag n\' drop enabled.');
    }

    textView.addEventListener('input', (event) => {
        if (event.data == null) {
            console.log(textUpload[0].outerText);
            console.log(editableContentBox);
        }
        else {
            inputContainer.removeClass('show-placeholder');
        }
    });

    form.addEventListener('submit', (event) => {
        textInput.value = textUpload[0].outerText;
    });

    textUpload.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
    })
        .on('dragover dragenter', function() {
            textUpload.addClass('is-dragover');
            uploadLabel.addClass('show')

        })
        .on('dragleave dragend drop', function() {
            textUpload.removeClass('is-dragover');
            uploadLabel.removeClass('show');
        })
        .on('drop', function(e) { // When drag n drop is supported.
            drFiles = e.originalEvent.dataTransfer.files;
            console.log(drFiles);
            // Trigger submit form.
            hiddenForm.trigger('submit');
        });

    hiddenForm.on('submit', function(e) {
        uploadingDisplay.addClass('working');
        uploadsResultsContainer.addClass('working');
        if (drFiles) {
            $.each(drFiles, function(i, file) {
                let uploader = new ChunkedUploader(file=file, form=hiddenForm);
                uploader.start();
                e.preventDefault();
            });
        }
        e.preventDefault();
    });
});

/*
function handleFiles(event) {
    drFiles = event;
    console.log(drFiles);
}

function dragStart(event) {
    console.log(event);
}

function stopDefaults(event) {
    event.preventDefault();
    event.stopPropagation();
}
*/
function handleEvent(event) {
    console.log(event);
}
