
document.addEventListener('DOMContentLoaded', function () {
    let upWidget = $('a#up');

    /*
    $('body').on('keydown', function (e) {
        console.log(e);
        console.log($(this));
        console.log(upWidget);
        upWidget.removeClass('hidden');

    });
    $('body').on('keyup', function (e) {

        console.log(e);
        console.log($(this));
        console.log(upWidget);

        setTimeout(function() { upWidget.addClass('hidden'); }, 6000)

    });

     */
    /*
    let lastScroll = 0;

    $(window).scroll(function (e) {
        console.log(lastScroll);
        console.log(e.timeStamp);
        if (typeof(e.timeStamp) !== 'undefined') {
            let timeDiff = e.timeStamp - lastScroll;
            lastScroll = e.timeStamp;
            console.log("Time since last scroll event: " + timeDiff.toString());
        }

        e.stopPropagation();
        console.log(e);
        console.log("Scroll Y:" + e.timeStamp.toString());
        upWidget.removeClass('hidden');
        setTimeout(function() { upWidget.addClass('hidden'); }, 10000)

    }); */

    upWidget.on('click', function (e) {
        $(this).addClass('hidden');
    });
    /*
    $(window).scroll(_.debounce(function() {
        upWidget.removeClass('hidden').fadeIn('slow');
    }, 1000, {'leading': true, 'trailing': false}));

    $(window).scroll(_.debounce(function() {
        setTimeout(function() { upWidget.addClass('hidden'); }, 4000)
    }, 1100));
    */

    $(window).scroll(function () {
        upWidget.removeClass('hidden');
        clearTimeout($.data(this, 'scrollTimer'));
        $.data(this, 'scrollTimer', setTimeout(function () {
            upWidget.addClass('hidden');
        }, 3000));
    });

});