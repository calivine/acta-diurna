let od = null;

class ChunkedUploader {
    constructor (file, form) {
        if (!this instanceof ChunkedUploader) {
            return new ChunkedUploader(file, form);
        }
        this.file = file;
        this.fileID = file.name;
        this.url = form.attr('action');
        this.type = form.attr('method');
        this.form = form;
        this.fileSize = this.file.size;
        this.chunkSize = (1024 * 1024); // 1MB
        this.rangeStart = 0;
        this.rangeEnd = this.chunkSize;
        this.chunkID = 0;
        this.chunksQuantity = Math.ceil(this.fileSize / this.chunkSize);
        this._slicer(file);

        /* AJAX Request Object */
        this.upload_request = new XMLHttpRequest();
        this.upload_request.onreadystatechange = () => {
            if (this.upload_request.readyState === 4 &&  this.upload_request.status === 200) {
                const response = JSON.parse(this.upload_request.responseText);
                console.log(response.progress);
            }
        };
        this.upload_request.onload = this._onChunkComplete;

        /* Event Listeners */
        /*this.upload_request.addEventListener("load", processEvent);
        this.upload_request.addEventListener("loadstart", processEvent);
        this.upload_request.addEventListener("loadend", processEvent);
        this.upload_request.addEventListener("progress", processEvent);*/
    }

    _slicer (file) {
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

    _upload () {
        let self = this,
            chunk;

        // Slight timeout needed here (File read / AJAX readystate conflict?)
        setTimeout(function() {
            // Prevent range overflow
            if (self.rangeEnd > self.fileSize) {
                self.rangeEnd = self.fileSize;
            }

            chunk = self.file[self.slice_method](self.rangeStart, self.rangeEnd);

            var formData = new FormData(self.form.get(0));
            formData.append('start', self.rangeStart);
            formData.append('end', self.rangeEnd);
            formData.append('file', chunk);
            // formData.append('size', self.fileSize);
            // formData.append('chunkID', self.chunkID);

            self.upload_request.open(self.type, self.url, true);
            self.upload_request.overrideMimeType('application/octet-stream');

            if (self.rangeStart !== 0) {
                self.upload_request.setRequestHeader('Content-Range', 'bytes ' + self.rangeStart + '-' + self.rangeEnd + '/' + self.fileSize);
            }
            self.upload_request.setRequestHeader('X-Chunk-Id', self.chunkID);
            self.upload_request.setRequestHeader('X-Content-Length', self.fileSize);
            self.upload_request.setRequestHeader('X-Content-Name', self.fileID);
            self.upload_request.setRequestHeader('X-Content-Id', self.fileID);

            od = self;
            self.upload_request.send(formData);
        }, 20);
    }

    _onChunkComplete () {
        // If the end range is already the same size as our file, we
        // can assume that our last chunk has been processed and exit
        // out of the function.
        let _this = od;

        if (_this.rangeEnd === _this.fileSize) {
            _this.form.removeClass('is-uploading');
            _this._onUploadComplete;
            return;
        }

        // Update our ranges
        _this.rangeStart = _this.rangeEnd;
        _this.rangeEnd = _this.rangeStart + _this.chunkSize;
        _this.chunkID++;

        // Continue as long as we aren't paused
        _this._upload();
    }

    _onUploadComplete () {
        return
    }

    /* Public Functions */
    start () {
        this._upload();
    }
}

function processEvent(evt) {
    let logMessage = `${evt.type}: ${evt.loaded} bytes transferred`;
    console.log(logMessage);

}
