

media.addEventListener('ended', function(event) {
    const gallery = document.getElementsByClassName('video__link');
    if (gallery.length > 0) {
        const next = gallery[0].getAttribute('href');
        console.log(next);
        window.open(next, "_self");
    }
    else {
        media.play();
    }
});