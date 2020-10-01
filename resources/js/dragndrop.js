var isAdvancedUpload = function() {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

// Upload form element
var $form = $('.box');
// File input element
var $input = $form.find('input[type="file"]');
// File input (vanilla)
var $file_input = document.getElementById('file');

console.log($input);
console.log($form.get(0));
console.log($file_input);

if (isAdvancedUpload) {
    $form.addClass('has-advanced-upload');
    console.log('Drag n\' drop enabled.');
}

if (isAdvancedUpload) {
    var droppedFiles = false;
    var uploaders = [];
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
        /*
        if (droppedFiles) {
            for (var i = 0; i < droppedFiles.length; i++) {

                var size = droppedFiles[i].size.formatBytes();
                //uploaders.push(new ChunkedUploader(droppedFiles[i]));
            }
        }*/
    });
}

$form.on('submit', function(e) {
    if ($form.hasClass('is-uploading')) return false;

    $form.addClass('is-uploading').removeClass('is-error');

    if (isAdvancedUpload) {
        // ajax
        // var ajaxData = new FormData($form.get(0));

        if (droppedFiles) {
            $.each(droppedFiles, function(i, file) {
                console.log(file);
                //uploaders.push(new ChunkedUploader(file=file, form=$form));
                let uploader = new ChunkedUploader(file=file, form=$form);
                uploader.start();
                e.preventDefault();
            });

        }
        e.preventDefault();

    } else {
        // ajax for legacy
        var iframeName  = 'uploadiframe' + new Date().getTime();
        $iframe   = $('<iframe name="' + iframeName + '" style="display: none;"></iframe>');

        $('body').append($iframe);
        $form.attr('target', iframeName);

        $iframe.one('load', function() {
            var data = JSON.parse($iframe.contents().find('body' ).text());
            $form
              .removeClass('is-uploading')
              .addClass(data.success == true ? 'is-success' : 'is-error')
              .removeAttr('target');
            if (!data.success) $errorMsg.text(data.error);
            $form.removeAttr('target');
            $iframe.remove();
        });
    }
});

var processAjax = function($form, ajaxData) {
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
            $form.addClass( data.success == true ? 'is-success' : 'is-error' );
            // if (!data.success) $errorMsg.text(data.error);
            console.log(data);
        },
        error: function () {
            // Log an error or show alert.
            $form.addClass('is-error');
        }
    });
};

var sendRequest = function($form, ajaxData) {
    var xhr = new XMLHttpRequest();
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
    }

    xhr.send(ajaxData);
};
