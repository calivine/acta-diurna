$(function () {
    const $textDisplay = $('.text-input-display');

    $textDisplay.on('paste input cut', function (e) {
        console.log(e.data);
        console.log(e.target);
        console.log(e.type);
    });
});