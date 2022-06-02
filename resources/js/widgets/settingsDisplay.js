document.addEventListener('DOMContentLoaded', function () {
    let navs = document.querySelectorAll('.nav_link');
    let displays = document.querySelectorAll('.form__wrapper');
    if (navs && displays) {
        console.log('Options Display widget enabled.');
    }
    navs.forEach(function (nav) {
        // nav.classList.remove('nav__active');
        nav.addEventListener('click', function (e) {
            navs.forEach(function (nav) {
                nav.classList.remove('nav__active');
            });
            nav.classList.add('nav__active');
            let displayTarget = e.target.getAttribute('id').split('__')[1];

            displays.forEach(function (display) {
                display.setAttribute('class', 'form__wrapper');
                if (display.getAttribute('id').split('__')[1] === displayTarget) {
                    display.classList.add('active');
                }
            });
        });
    });
});
