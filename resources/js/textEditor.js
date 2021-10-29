$(function () {
    const $textDisplay = $('.text-input__display');

    $textDisplay.on('paste input cut', function (e) {
        console.log(e.data);
        console.log(e.target);
        console.log(e.type);
    });
});