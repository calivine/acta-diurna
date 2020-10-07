
class ChunkedUploader {
    constructor (file, form) {
        if (!this instanceof ChunkedUploader) {
            return new ChunkedUploader(file, form);
        }

        let dt = Date.now().toString().substring(9);
        console.log(Date.now().toString());
        console.log(dt);

        this.threadsQuantity = 2;
        this.activeConnections = {};

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
        const activeConnections = Object.keys(this.activeConnections).length;

        if (activeConnections >= this.threadsQuantity) {
            return;
        }

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

        this._sendNext();
    }

    _upload (formData, chunkId) {
        return new Promise((resolve, reject) => {
            /* AJAX Request Object */
            const xhr = this.activeConnections[chunkId] = new XMLHttpRequest();

            xhr.open(this.type, this.url, true);

            xhr.overrideMimeType('application/octet-stream');

            if (this.rangeStart !== 0) {
                xhr.setRequestHeader('Content-Range', 'bytes ' + this.rangeStart + '-' + this.rangeEnd + '/' + this.fileSize);
            }
            xhr.setRequestHeader('X-Chunk-Id', chunkId);
            xhr.setRequestHeader('X-Content-Length', this.fileSize);
            xhr.setRequestHeader('X-Content-Name', this.file.name);
            xhr.setRequestHeader('X-Content-Id', this.fileID);

            xhr.onreadystatechange = () => {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    console.log(response.progress, response.data);
                    this._progress_handler(response);
                    resolve();
                    delete this.activeConnections[chunkId];
                }
            };
            xhr.onerror = (error) => {
                reject(error);
                delete this.activeConnections[chunkId];
            };
            xhr.send(formData);
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
