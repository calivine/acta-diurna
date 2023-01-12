
class PostHandler {
    constructor (url, data='', method='POST') {
        this.url = url;
        this.data = data;
        this.method = method;
        this.xhr = new XMLHttpRequest();
        this.xhr.open(this.method, this.url, true);
    }

    _send () {
        
        
        // this.xhr.setRequestHeader('Content-Type', 'text/html');
        

        this.xhr.send(0);
    }

    setHeader(header, value) {
        this.xhr.setRequestHeader(header, value);
    }

    start () {
        this._send();
    }
}
