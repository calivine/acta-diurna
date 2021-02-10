$(function () {
    let upWidget = $('#up');

    upWidget.on('click', function (e) {
        $(this).addClass('hidden');
    });

    $(window).scroll(function () {
        upWidget.removeClass('hidden');
        clearTimeout($.data(this, 'scrollTimer'));
        $.data(this, 'scrollTimer', setTimeout(function () {
            upWidget.addClass('hidden');
        }, 3000));
    });

    console.log("PageUp Widget enabled");
});
