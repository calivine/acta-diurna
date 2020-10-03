
class ChunkedUploader {
    constructor (file, form) {
        if (!this instanceof ChunkedUploader) {
            return new ChunkedUploader(file, form);
        }

        let dt = Date.now().toString().substring(9);
        console.log(Date.now().toString());
        console.log(dt);

        this.file = file;
        this.fileID = dt;
        this.url = form.attr('action');
        this.type = form.attr('method');
        this.form = form;
        this.fileSize = this.file.size;
        this.chunkSize = (1024 * 1024); //
        this.rangeStart = 0;
        this.rangeEnd = this.chunkSize;
        this.chunkID = 0;
        this.chunksQuantity = Math.ceil(this.fileSize / this.chunkSize);
        this.chunksQueue = new Array(this.chunksQuantity).fill().map((_, index) => index).reverse();

        this._get_slice_method(file);
    }

    _get_slice_method (file) {
        if ('mozSlice' in this.file) {
            this.slice_method = 'mozSlice';
        }
        else if ('webkitSlice' in this.file) {
            this.slice_method = 'webkitSlice';
        }
        else {
            this.slice_method = 'slice';
        }

    }

    _sendNext () {
        if (!this.chunksQueue.length) {
            this.form.removeClass('is-uploading');
            $('#upload-display').removeClass('working');
            return;
        }
        const chunkId = this.chunksQueue.pop();
        this.rangeStart = chunkId * this.chunkSize;
        this.rangeEnd = this.rangeStart+this.chunkSize;

        // Prevent range overflow
        if (this.rangeEnd > this.fileSize) {
            this.rangeEnd = this.fileSize;
        }

        // Get chunk to send
        const chunk = this.file[this.slice_method](this.rangeStart, this.rangeEnd);

        // Package chunk and formData for upload method.
        let formData = new FormData(this.form.get(0));
        formData.append('start', this.rangeStart);
        formData.append('end', this.rangeEnd);
        formData.append('file', chunk);
        this._upload(formData, chunkId)
            .then(() => {
                this._sendNext();
            })
            .catch(() => {
                this.chunksQueue.pop();
            });
    }

    _upload (formData, chunkId) {
        return new Promise((resolve, reject) => {
            /* AJAX Request Object */
            this.upload_request = new XMLHttpRequest();

            this.upload_request.open(this.type, this.url, true);

            this.upload_request.overrideMimeType('application/octet-stream');

            if (this.rangeStart !== 0) {
                this.upload_request.setRequestHeader('Content-Range', 'bytes ' + this.rangeStart + '-' + this.rangeEnd + '/' + this.fileSize);
            }
            this.upload_request.setRequestHeader('X-Chunk-Id', chunkId);
            this.upload_request.setRequestHeader('X-Content-Length', this.fileSize);
            this.upload_request.setRequestHeader('X-Content-Name', this.file.name);
            this.upload_request.setRequestHeader('X-Content-Id', this.fileID);

            this.upload_request.onreadystatechange = () => {
                if (this.upload_request.readyState === 4 && this.upload_request.status === 200) {
                    const response = JSON.parse(this.upload_request.responseText);
                    console.log(response.progress, response.data);
                    this._progress_handler(response);
                    resolve();
                }
            };
            this.upload_request.onerror = reject;
            this.upload_request.send(formData);
        });


    }

    _progress_handler (response) {
        let editor = $('.editor');
        let uploadsContainer = $('.upload-results-container');
        let id = '#'+response.data;
        if (document.getElementById(response.data)) {
            let progBar = document.getElementById(response.data);
            progBar.innerText = `${response.data}: ${response.progress}%`;
            console.log(progBar);

        }
        else {
            let $progBar = $('<div></div>');
            $progBar.attr('id', response.data);
            $progBar.attr('class', 'progress-display');
            $progBar.innerText = `${response.data}: ${response.progress}%`;
            console.log($progBar);
            uploadsContainer.append($progBar);
        }
    }

    /* Public Functions */
    start () {
        this._sendNext();
    }
}

function processEvent(evt) {
    let logMessage = `${evt.type}: ${evt.loaded} bytes transferred`;
    console.log(logMessage);
}

function dropHandler(ev) {
  console.log('File(s) dropped');

  // Prevent default behavior (Prevent file from being opened)
  ev.preventDefault();

  if (ev.dataTransfer.items) {
    // Use DataTransferItemList interface to access the file(s)
    for (var i = 0; i < ev.dataTransfer.items.length; i++) {
      // If dropped items aren't files, reject them
      if (ev.dataTransfer.items[i].kind === 'file') {
        var file = ev.dataTransfer.items[i].getAsFile();
        console.log('... file[' + i + '].name = ' + file.name);
        console.log('size: ' + file.size + ' modified: ' + file.lastModified);


      }
    }
  } else {
    // Use DataTransfer interface to access the file(s)
    for (var i = 0; i < ev.dataTransfer.files.length; i++) {
      console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
    }
  }
};

function dragOverHandler(ev) {
  console.log('File(s) in drop zone');

  // Prevent default behavior (Prevent file from being opened)
  ev.preventDefault();
};

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
