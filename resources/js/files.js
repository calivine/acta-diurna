/**
 * Utility method to format bytes into the most logical magnitude (KB, MB,
 * or GB).
 */
Number.prototype.formatBytes = function() {
    var units = ['B', 'KB', 'MB', 'GB', 'TB'],
        bytes = this,
        i;

    for (i = 0; bytes >= 1024 && i < 4; i++) {
        bytes /= 1024;
    }

    return bytes.toFixed(2) + units[i];
}

var od;
function ChunkedUploader(file, form) {
    if (!this instanceof ChunkedUploader) {
        return new ChunkedUploader(file, form);
    }

    this.file = file;
    this.fileID = file.name;
    this.url = form.attr('action');
    this.type = form.attr('method');
    this.form = form;
    this.inputForm = form.get(0);
    this.fileSize = this.file.size;
    this.chunkSize = (1024 * 1024); // 1MB
    this.rangeStart = 0;
    this.rangeEnd = this.chunkSize;
    this.chunkID = 0;

    const chunksQuantity = Math.ceil(this.fileSize / this.chunkSize);
    console.log(chunksQuantity);
    console.log(file.name);

    if ('mozSlice' in this.file) {
        this.slice_method = 'mozSlice';
    }
    else if ('webkitSlice' in this.file) {
        this.slice_method = 'webkitSlice';
    }
    else {
        this.slice_method = 'slice';
    }

    this.upload_request = new XMLHttpRequest();


    this.upload_request.onload = this._onChunkComplete;
    this.upload_request.addEventListener("load", processEvent);
    this.upload_request.addEventListener("loadstart", processEvent);
    this.upload_request.addEventListener("loadend", processEvent);
    this.upload_request.addEventListener("progress", processEvent);
    //console.log(this);
}

ChunkedUploader.prototype = {

// Internal Methods __________________________________________________

    _upload: function() {
        var self = this,
            chunk;

        // Slight timeout needed here (Video read / AJAX readystate conflict?)
        setTimeout(function() {
            // Prevent range overflow
            if (self.rangeEnd > self.fileSize) {
                self.rangeEnd = self.fileSize;
            }

            chunk = self.file[self.slice_method](self.rangeStart, self.rangeEnd);
            var formData = new FormData(self.inputForm);
            formData.append('start', self.rangeStart);
            formData.append('end', self.rangeEnd);
            formData.append('file', chunk);
            formData.append('size', self.fileSize);
            formData.append('chunkID', self.chunkID);

            self.upload_request.open(self.type, self.url, true);
            self.upload_request.overrideMimeType('application/octet-stream');

            if (self.rangeStart !== 0) {
                self.upload_request.setRequestHeader('Content-Range', 'bytes ' + self.rangeStart + '-' + self.rangeEnd + '/' + self.fileSize);
            }
            self.upload_request.setRequestHeader('X-Content-Length', self.file.size);
            self.upload_request.setRequestHeader('X-Content-Name', self.fileID);
            self.upload_request.setRequestHeader('X-Content-Id', self.fileID);

            od = self;
            self.upload_request.send(formData);

            // TODO
            // From the looks of things, jQuery expects a string or a map
            // to be assigned to the "data" option. We'll have to use
            // XMLHttpRequest object directly for now...

            /*$.ajax({
                url: self.url,
                data: formData,
                type: self.type,
                mimeType: 'application/octet-stream',
                contentType:false,
                processData: false,
                headers: (self.rangeStart !== 0) ? {
                    'Content-Range': ('bytes ' + self.rangeStart + '-' + self.rangeEnd + '/' + self.fileSize),
                    'X-Content-Id': this.fileID
                } : {},
                success: self._onChunkComplete
            });*/
        }, 2000);
    },

// Event Handlers ____________________________________________________

    _onChunkComplete: function() {
        // If the end range is already the same size as our file, we
        // can assume that our last chunk has been processed and exit
        // out of the function.
        var _this = od;

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
        if (!this.is_paused) {
            _this._upload();
        }
    },

    _onUploadComplete: function() {
        return;
    },

// Public Methods ____________________________________________________

    start: function() {
        this._upload();
    },

    pause: function() {
        this.is_paused = true;
    },

    resume: function() {
        this.is_paused = false;
        this._upload();
    }
};

function processEvent(evt) {
    let logMessage = `${evt.type}: ${evt.loaded} bytes transferred`;
    console.log(logMessage);

}
