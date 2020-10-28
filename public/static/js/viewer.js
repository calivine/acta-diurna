
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

const media = document.querySelector('video');
let realView = false;

media.addEventListener('timeupdate', checkTime);

function checkTime() {

    if (media.currentTime >= 10 && !realView) {
        const url = media.id.toString().substring(4);
        realView = true;
        // Ajax call to update view count.
        const post = new PostHandler('/watch/view', url);
        post.start();
    }
}

const gallery = document.getElementsByClassName('video__link');
let nextContainer = gallery[0];

if (nextContainer) {
    nextContainer.setAttribute('id', 'up-next');
}

media.addEventListener('ended', function(event) {

    if (gallery.length > 0) {
        const next = gallery[0].getAttribute('href');

        window.open(next, "_self");
    }
    else {
        media.play();
    }
});


window.addEventListener('resize', function (e) {
    console.log(e);
    console.log(window.innerWidth);
});
document.addEventListener('DOMContentLoaded', function () {

    const allVideos = Array.from(document.getElementsByClassName('media'));
    if (allVideos) {
        const totalVideos = allVideos.length;

        let numberVisible = 5;
        const forwardButton = document.getElementById('forward');
        const backButton = document.getElementById('back');

        const visible = [];

        if (totalVideos < numberVisible) {
            numberVisible = totalVideos;
        }

        // Hide all videos
        for (let i = 0; i < totalVideos; i++) {
            allVideos[i].className = "media hidden_item";
        }
        // Initialize
        for (let i = 0; i < numberVisible; i++) {
            visible.push(allVideos.shift());
        }
        visible.forEach(function (v) {
            v.className = "media";
        });

        forwardButton.addEventListener('click', function () {

            visible.push(allVideos.shift());
            allVideos.push(visible.shift());
            visible.forEach(function (v) {
                if (v){
                    v.className = "media";
                }

            });
            allVideos.forEach(function (v) {
                if (v){
                    v.className = "media hidden_item";
                }
            });
        });

        backButton.addEventListener('click', function () {
            visible.unshift(allVideos.pop());
            allVideos.unshift(visible.pop());
            visible.forEach(function (v) {
                v.className = "media";
            });
            allVideos.forEach(function (v) {
                v.className = "media hidden_item";
            });
        });
    }

});

