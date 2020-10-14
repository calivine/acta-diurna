const isAdvancedUpload = function() {
    const div = document.createElement('div');
    return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

class ChunkedUploader {
    constructor (file, form) {
        if (!this instanceof ChunkedUploader) {
            return new ChunkedUploader(file, form);
        }

        let dt = Date.now().toString().substring(6);
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
                this.chunksQueue.push();
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
        console.log(response);
        let editor = $('.editor');
        let uploadsContainer = $('.upload-results-container');
        let id = '#'+response.data;
        if (document.getElementById(response.data)) {
            let progBar = document.getElementById(response.data);
            progBar.innerText = `${response.data}: ${response.progress}%`;
            console.log(progBar);
            if (response.thumbnail !== 'none') {
                console.log(response.thumbnail);
                let source = "http://thrillgifs.loc/storage/thumbnails/" + response.thumbnail;
                let $thumbnail = $('<img height="80px" width="80px" alt="prev-thumbnail">');
                $thumbnail.attr('src', source);
                console.log($thumbnail);
                progBar.prepend($thumbnail[0]);
            }

        }
        else {
            let $progBar = $('<div class="media"><div class="media-body"></div></div>');
            $progBar.attr('id', response.data);
            $progBar.innerText = `${response.data}: ${response.progress}%`;
            console.log($progBar);
            uploadsContainer.append($progBar);
            if (response.thumbnail !== 'none') {
                console.log(response.thumbnail);
                let source = "http://thrillgifs.loc/storage/thumbnails/" + response.thumbnail;
                let $thumbnail = $('<img height="80px" width="80px" alt="prev-thumbnail">');
                $thumbnail.attr('src', source);
                console.log($thumbnail);
                $progBar.prepend($thumbnail[0]);
            }
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
