const isAdvancedUpload = function() {
  const div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

document.addEventListener('DOMContentLoaded', function () {
    // Upload form element
    let $form = $('.box');
    console.log($form);
    // Video input element
    let $input = $form.find('input[type="file"]');
    // Video input (vanilla)
    let $file_input = document.getElementById('file');

    let uploadingDisplay = $('#upload-display');
    let uploadsResultsContainer = $('.upload-results-container');
    if (isAdvancedUpload) {
        $form.addClass('has-advanced-upload');
        console.log('Drag n\' drop enabled.');
    }

    if (isAdvancedUpload) {
        let droppedFiles = false;
        let uploaders = [];
        $form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
        })
            .on('dragover dragenter', function() {
                $form.addClass('is-dragover');
            })
            .on('dragleave dragend drop', function() {
                $form.removeClass('is-dragover');
            })
            .on('drop', function(e) { // When drag n drop is supported.
                droppedFiles = e.originalEvent.dataTransfer.files;
                // Trigger submit form.
                $form.trigger('submit');
            });

        $form.on('submit', function(e) {
            uploadingDisplay.addClass('working');
            uploadsResultsContainer.addClass('working');
            if (droppedFiles) {
                $.each(droppedFiles, function(i, file) {
                    let uploader = new ChunkedUploader(file, form=$form);
                    uploader.start();
                    e.preventDefault();
                });
            }
            e.preventDefault();
        });
    }
});

const processAjax = function($form, ajaxData) {
    $.ajax({
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: ajaxData,
        cache: false,
        contentType:false,
        processData: false,
        complete: function () {
            $form.removeClass('is-uploading');
        },
        success: function (data) {
            $form.addClass( data.success === true ? 'is-success' : 'is-error' );
            // if (!data.success) $errorMsg.text(data.error);
            console.log(data);
        },
        error: function () {
            // Log an error or show alert.
            $form.addClass('is-error');
        }
    });
};

const sendRequest = function($form, ajaxData) {
    let xhr = new XMLHttpRequest();
    xhr.open($form.attr('method'), $form.attr('action'), true);

    xhr.onload = function() {
        $form.removeClass('is-uploading');
        if( xhr.status >= 200 && xhr.status < 400 )
        {
        	//var data = JSON.parse(xhr.responseText);
            //form.classList.add(data.success == true ? 'is-success' : 'is-error');
        	//if(!data.success) errorMsg.textContent = data.error;
        }
        else alert('Error. Please, contact the webmaster!');
    };

    xhr.send(ajaxData);
};
