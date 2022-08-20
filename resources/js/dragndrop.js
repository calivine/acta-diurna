const isAdvancedUpload = function () {
    const div = document.createElement('div');
    return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

const test_progress = function (response) {
    console.log(response);
}


// Run when the page loads.
document.addEventListener('DOMContentLoaded', function () {
    // Upload form element
    let $form = $('form.box');
    let $form2 = $('form#update-podcast');
    let $updateThumbnailBox = $('.box#update-thumbnail');

    console.log($form);
    console.log($form2);

    // File input element
    let $input = $form.find('input[type="file"]');
    // File input (vanilla)
    let $file_input = document.getElementById('file');
    let $input2 = $("form#update-podcast input[type='file']");
    console.log($input);
    console.log($input2);

    let uploadingDisplay = $('#upload-display');
    let uploadsResultsContainer = $('.upload-results-container');
    if (isAdvancedUpload) {
        $form.addClass('has-advanced-upload');
        $updateThumbnailBox.addClass('has-advanced-upload');
        console.log('Drag n\' drop enabled.');
    }

    if (isAdvancedUpload) {
        let droppedFiles = false;
        let uploaders = [];
        $form.on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
        })
            .on('dragover dragenter', function () {
                $form.addClass('is-dragover');
            })
            .on('dragleave dragend drop', function () {
                $form.removeClass('is-dragover');
            })
            .on('drop', function (e) { // When drag n drop is supported.
                droppedFiles = e.originalEvent.dataTransfer.files;
                // Trigger submit form.
                console.log('Triggering form submit');
                $form.trigger('submit');
            });

        $form.on('submit', function (e) {
            console.log('Adding to Uploader');
            uploadingDisplay.addClass('working');
            uploadsResultsContainer.addClass('working');
            if (droppedFiles) {
                console.log(droppedFiles.length);
                if (droppedFiles.length === 1) {
                    console.log(droppedFiles[0].size);
                    if (droppedFiles[0].size <= 1500000) {
                        console.log('Submitting');
                        $input.prop('files', droppedFiles);

                    }
                    else {
                        let uploader = new ChunkedUploader(droppedFiles[0], $form, test_progress);
                        uploader.start();
                        e.preventDefault();
                    }
                } else {
                    $.each(droppedFiles, function (i, file) {
                        let uploader = new ChunkedUploader(file, $form, test_progress);
                        uploader.start();
                        e.preventDefault();
                    });
                }
            } else {
                e.preventDefault();
            }
        });
        $updateThumbnailBox.on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
        })
            .on('dragover dragenter', function () {
                $updateThumbnailBox.addClass('is-dragover');
            })
            .on('dragleave dragend drop', function () {
                $updateThumbnailBox.removeClass('is-dragover');
            })
            .on('drop', function (e) { // When drag n drop is supported.
                droppedFiles = e.originalEvent.dataTransfer.files;
                // Trigger submit form.
                console.log('Triggering form submit');
                $form2.trigger('submit');
            });
        $form2.on('submit', function (e) {
            console.log('Adding to Uploader');
            uploadingDisplay.addClass('working');
            uploadsResultsContainer.addClass('working');
            if (droppedFiles) {
                console.log(droppedFiles.length);
                if (droppedFiles.length === 1) {
                    console.log(droppedFiles[0].size);
                    if (droppedFiles[0].size <= 1500000) {
                        console.log('Submitting');
                        $input2.prop("files", droppedFiles);

                    }
                    else {
                        let uploader = new ChunkedUploader(droppedFiles[0], $form2, test_progress);
                        uploader.start();
                        e.preventDefault();
                    }
                } else {
                    $.each(droppedFiles, function (i, file) {
                        let uploader = new ChunkedUploader(file, $form2, test_progress);
                        uploader.start();
                        e.preventDefault();
                    });
                }
            } else {
                e.preventDefault();
            }
        });



    }
});

const processAjax = function ($form, ajaxData) {
    $.ajax({
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: ajaxData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function () {
            $form.removeClass('is-uploading');
        },
        success: function (data) {
            $form.addClass(data.success === true ? 'is-success' : 'is-error');
            // if (!data.success) $errorMsg.text(data.error);
            console.log(data);
        },
        error: function () {
            // Log an error or show alert.
            $form.addClass('is-error');
        }
    });
};

const sendRequest = function ($form, ajaxData) {
    let xhr = new XMLHttpRequest();
    xhr.open($form.attr('method'), $form.attr('action'), true);

    xhr.onload = function () {
        $form.removeClass('is-uploading');
        if (xhr.status >= 200 && xhr.status < 400) {
            //var data = JSON.parse(xhr.responseText);
            //form.classList.add(data.success == true ? 'is-success' : 'is-error');
            //if(!data.success) errorMsg.textContent = data.error;
        } else alert('Error. Please, contact the webmaster!');
    };

    xhr.send(ajaxData);
};
