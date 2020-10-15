function handleEvent(event) {
    const yScroll = window.scrollY;
    let test = document.querySelector('.scroll');
    console.log(yScroll);
    if (yScroll > 126) {
        test.className = "scroll animate";
    }
    else if (yScroll < 125) {
        test.className = "scroll animate__reverse";
    }

    event.preventDefault();

}

window.addEventListener('scroll', handleEvent);

