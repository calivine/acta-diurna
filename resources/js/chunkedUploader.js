
class ChunkedUploader {
    constructor (file, form, progressHandler) {
        if (!this instanceof ChunkedUploader) {
            return new ChunkedUploader(file, form, progressHandler);
        }

        // const dt = Date.now().toString().substring(6);

        this.file = file;
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
        this._progress_handler = progressHandler;

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
            this.upload_request.setRequestHeader('Content-Disposition', `${chunkId}:${this.file.name}-${this.fileType}-${this.fileSize}`);

            this.upload_request.onreadystatechange = () => {
                if (this.upload_request.readyState === 4 && this.upload_request.status === 200) {
                    const response = JSON.parse(this.upload_request.responseText);
                    // ChunkedUploader._progress_handler(response);
                    this._progress_handler(response);
                    resolve();
                }
            };
            this.upload_request.onerror = reject;
            this.upload_request.send(formData);
        });


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
