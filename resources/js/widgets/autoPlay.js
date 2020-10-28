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