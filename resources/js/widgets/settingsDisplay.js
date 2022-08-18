document.addEventListener('DOMContentLoaded', function () {
    let navs = document.querySelectorAll('.nav-link');
    let displays = document.querySelectorAll('.form-wrapper');
    if (navs && displays) {
        console.log('Options Display widget enabled.');
    }
    navs.forEach(function (nav) {
        // nav.classList.remove('nav__active');
        nav.addEventListener('click', function (e) {
            navs.forEach(function (nav) {
                nav.classList.remove('nav-active');
            });
            nav.classList.add('nav-active');
            let displayTarget = e.target.getAttribute('id').split('-')[1];

            displays.forEach(function (display) {
                display.setAttribute('class', 'form-wrapper');
                if (display.getAttribute('id').split('-')[1] === displayTarget) {
                    display.classList.add('active');
                }
            });
        });
    });
});
