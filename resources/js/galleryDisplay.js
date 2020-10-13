document.addEventListener('DOMContentLoaded', function () {
    let allVideos = document.getElementsByClassName('media');
    const totalVideos = allVideos.length;


    console.log(allVideos);
    const numberVisible = 5;
    const forwardButton = document.getElementById('forward');
    const backButton = document.getElementById('back');
    let visibleStart = 0;
    let visibleStop = numberVisible;

    for (let i = 0; i < totalVideos; i++) {
        allVideos[i].className = 'media';
    }

    for (let i = visibleStop; i < totalVideos; i++) {
        allVideos[i].setAttribute('class', 'media hidden_item');
    }

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

});

