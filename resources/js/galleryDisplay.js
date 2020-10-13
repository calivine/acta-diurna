document.addEventListener('DOMContentLoaded', function () {
    const allVideos = Array.from(document.getElementsByClassName('media'));
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
    })

/*
    forwardButton.addEventListener('click', function () {
        console.log(visibleStart);
        console.log(visibleStop);
        if (visibleStop === totalVideos) {
            visibleStop = 0;
            allVideos[visibleStop].className = 'media';
            allVideos[visibleStart].className = 'media hidden_item';
            visibleStart++;
            visibleStop++;
        }
        else if (visibleStart === totalVideos) {
            visibleStart = 0;
            allVideos[visibleStop].className = 'media';
            allVideos[visibleStart].className = 'media hidden_item';
            visibleStart++;
            visibleStop++;
        }
        else {
            allVideos[visibleStart].className = 'media hidden_item';
            allVideos[visibleStop].className = 'media';
            visibleStart++;
            visibleStop++;
        }

    });
*/
});

