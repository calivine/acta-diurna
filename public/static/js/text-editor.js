document.addEventListener('DOMContentLoaded', function () {
    const textInput = document.querySelector('.text-input');
    const form = document.querySelector('.write-post__form');


    let textView = document.querySelector('.text-input__display');


    let textUpload = $('.text-input__display');
    let editableContentBox = document.querySelector('.text-input__display');

    const inputContainer = $('.text-input__container.show-placeholder');


    if (isAdvancedUpload) {
        textUpload.addClass('has-advanced-upload');
        console.log('Drag n\' drop enabled.');
    }

    textView.addEventListener('input', (event) => {
        if (event.data == null) {
            console.log(textUpload[0].outerText);
            console.log(editableContentBox);
        }
        else {
            inputContainer.removeClass('show-placeholder');
        }
    });

    // Submit user input through text element
    form.addEventListener('submit', (event) => {
        textInput.value = textUpload[0].outerText;
    });
});
