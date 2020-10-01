
class PostHandler {
    constructor (url, data) {
        this.url = url;
        this.data = data;
        this.method = 'POST'
    }

    _send () {
        this.xhr = new XMLHttpRequest();
        this.xhr.open(this.method, this.url, true);
        // this.xhr.setRequestHeader('Content-Type', 'text/html');
        this.xhr.setRequestHeader('X-Content-Id', this.data);

        this.xhr.send(0);
    }

    start () {
        this._send();
    }
}
