const media = document.querySelector('video');
let realView = false;

media.addEventListener('ended', function(event) {
    console.log(event);
    let video = $('video');

    video.attr('src', 'http://thrillgifs.loc/storage/videos/0PYxwTTzVxmontage5Rachel_Roxxx-9.mp4');
});
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
