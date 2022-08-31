
class PostHandler {
    constructor (url, data, method='POST') {
        this.url = url;
        this.data = data;
        this.method = method
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
