
class PostHandler {
    constructor (url, data) {
        this.url = url;
        this.data = data;
        this.method = 'POST'
    }

    _send () {
        this.xhr = new XMLHttpRequest();
        this.xhr.open(this.method, this.url, true);
        this.xhr.setRequestHeader('Content-Type', 'text/html');
        this.xhr.setRequestHeader('X-Content-Id', this.data);

        this.xhr.send(0);
    }

    start () {
        this._send();
    }
}

const media = document.querySelector('video');
let realView = false;
media.addEventListener('timeupdate', checkTime);



function checkTime() {

    if (media.currentTime >= 10 && !realView) {
        console.log('This counts as a view.');

        const url = media.id.toString().substring(4);
        realView = true;
        // Ajax call to update view count.
        const post = new PostHandler('/watch/view', url);
        post.start();
    }
}
