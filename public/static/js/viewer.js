const media = document.querySelector('video');
let realView = false;

media.addEventListener('timeupdate', checkTime);

console.log('View Counter widget enabled');

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

console.log('AutoPlay widget enabled.');

media.addEventListener('ended', function() {

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
        console.log('Gallery Display widget enabled');
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

