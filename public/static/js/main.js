const isAdvancedUpload = function() {
  const div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

document.addEventListener('DOMContentLoaded', function () {
    // Upload form element
    let $form = $('.box');
// Video input element
    let $input = $form.find('input[type="file"]');
// Video input (vanilla)
    let $file_input = document.getElementById('file');

    let uploadingDisplay = $('#upload-display');
    let uploadsResultsContainer = $('.upload-results-container');
    console.log($input);
    console.log($form);
    console.log($form.get(0));
    console.log($file_input);

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


class ChunkedUploader {
    constructor (file, form) {
        if (!this instanceof ChunkedUploader) {
            return new ChunkedUploader(file, form);
        }

        const dt = Date.now().toString().substring(6);

        this.file = file;
        this.fileID = dt;
        this.url = form.attr('action');
        this.type = form.attr('method');
        this.form = form;
        this.fileSize = this.file.size;
        this.fileType = this.file.type;
        this.chunkSize = (1024 * 1024); //
        this.rangeStart = 0;
        this.rangeEnd = this.chunkSize;
        this.chunksQuantity = Math.ceil(this.fileSize / this.chunkSize);
        this.chunksQueue = new Array(this.chunksQuantity).fill().map((_, index) => index).reverse();

        this._get_slice_method();
    }

    _get_slice_method () {
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
        formData.append('file', chunk);
        this._upload(formData, chunkId)
            .then(() => {
                this._sendNext();
            })
            .catch(() => {
                this.chunksQueue.push();
            });
    }

    _upload (formData, chunkId) {
        return new Promise((resolve, reject) => {
            /* AJAX Request Object */
            this.upload_request = new XMLHttpRequest();

            this.upload_request.open(this.type, this.url, true);

            this.upload_request.overrideMimeType('application/octet-stream');


            this.upload_request.setRequestHeader('Content-Range', 'bytes ' + this.rangeStart + '-' + this.rangeEnd + '/' + this.fileSize);
            this.upload_request.setRequestHeader('Content-Disposition', `${chunkId}:${this.fileID}-${this.file.name}-${this.fileType}-${this.fileSize}`);

            this.upload_request.onreadystatechange = () => {
                if (this.upload_request.readyState === 4 && this.upload_request.status === 200) {
                    const response = JSON.parse(this.upload_request.responseText);
                    ChunkedUploader._progress_handler(response);
                    resolve();
                }
            };
            this.upload_request.onerror = reject;
            this.upload_request.send(formData);
        });


    }

    static _progress_handler (response) {
        let uploadsContainer = $('.upload-results-container');
        if (document.getElementById(response.data)) {
            let progBar = document.getElementById(response.data);
            let $progressBar_body = progBar.children[1];
            if ($progressBar_body) {
                $progressBar_body.innerText = `${response.data}: ${response.progress}%`;
            }
            else {
                $progressBar_body = progBar.children[0];
                $progressBar_body.innerText = `${response.data}: ${response.progress}%`;
            }
            if (response.thumbnail !== 'none') {
                progBar.children[0].remove();
                // $('div.widget__uploading').remove();
                let $thumbnail = $('<img height="80px" width="80px" alt="prev-thumbnail">');
                $thumbnail.attr('src', response.thumbnail);
                // console.log($thumbnail);
                progBar.prepend($('<img src=' + response.thumbnail + ' height="80px" width="80px" alt="prev-thumbnail">')[0]);
            }

        }
        else {
            // Generate uploading progress bar
            // let $progressBar = ChunkedUploader._create_progress_bar(response);
            // Add to upload results container
            uploadsContainer.append(ChunkedUploader._create_progress_bar(response));
        }
    }

    static _create_progress_bar(response) {
        let $progressBar = $('<div class="media"><div class="media-body"></div></div>');
        $progressBar.attr('id', response.data);
        let $progressBar_body = $progressBar.children()[0];
        $progressBar_body.innerText = `${response.data}: ${response.progress}%`;
        // $progressBar.innerText = `${response.data}: ${response.progress}%`;
        let $thumbnail = response.progress !== 100 ? $('<div class="widget__uploading"></div>') : $('<img src=' + response.thumbnail + ' height="80px" width="80px" alt="prev-thumbnail">');

        // $thumbnail.attr('src', response.thumbnail);
        $progressBar.prepend($thumbnail[0]);
        return $progressBar;
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

document.addEventListener('DOMContentLoaded', function () {
    let navs = document.querySelectorAll('.nav__item');
    let displays = document.querySelectorAll('.form__wrapper')

    navs.forEach(function (nav) {
        // nav.classList.remove('nav__active');
        nav.addEventListener('click', function (e) {
            navs.forEach(function (nav) {
                nav.classList.remove('nav__active');
            });
            nav.classList.add('nav__active');
            let displayTarget = e.target.getAttribute('id').split('__')[1];

            displays.forEach(function (display) {
                display.setAttribute('class', 'form__wrapper');
                if (display.getAttribute('id').split('__')[1] === displayTarget) {
                    display.classList.add('active');
                }
            });
        });
    });
});
