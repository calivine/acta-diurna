
let footnotes = $('.post-footnotes > li');
let notes = $('.footnote');

notes.each(function () {
    $(this).on('click', function () {
        console.log($(this));
        console.log($(this)[0].firstChild.hash);
        // Remove active class from current footnotes
        footnotes.each(function () {
            console.log($(this));
            $(this).removeClass('highlighted');
        });
        // Add active class to footnote that was clicked.
        $($(this)[0].firstChild.hash).addClass('highlighted');
    })
});

console.log("Footnotes widget enabled");
