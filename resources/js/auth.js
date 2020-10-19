document.addEventListener('DOMContentLoaded', function () {
    let inputs = document.querySelectorAll('input.form-control');
    let submitButton = document.querySelector('button');

    inputs.forEach(function (input) {
        console.log(input);
        if (input.value === "") {
            console.log("Empty input!");
        }
    });
});
