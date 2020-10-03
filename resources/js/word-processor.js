let textInput = document.querySelector('.text-input');
let textView = document.querySelector('.text-input-display');
let form = document.querySelector('.post-form');
const inputContainer = $('.input-container.show-placeholder');
let textUpload = $('.text-input-display');

let ppCount = 1;
let postText = "";
let editorContainer = $('.editor');
let drFiles = false;

textView.addEventListener('input', (event) => {

    console.log(event);

    if (event.data == null) {
        if (event.inputType == 'deleteContentBackward') {
            postText = postText.slice(0,-1);
        }
        else {
            console.log('Pressed Enter');
            // Create a p element
            let p = document.createElement("p");
            postText += '\n';
            p.appendChild(document.createTextNode(postText));
            textInput.appendChild(p);
            textInput.value += p.innerHTML;
            console.log(p);
            console.log(p.innerHTML);
            postText = "";
            console.log(textInput);
        }
    }
    else {
        postText += event.data;
        inputContainer.removeClass('show-placeholder');
    }
});

form.addEventListener('submit', (event) => {
    let p = document.createElement("p");
    p.appendChild(document.createTextNode(postText));
    // textInput.appendChild(p);
    textInput.value += p.innerHTML;
});


textView.addEventListener('select', (event) => {
    console.log(event);
    // let logMessage = `${evt.type}: ${evt.loaded} bytes transferred`;
    // console.log(logMessage);
});

textView.addEventListener('paste', handleEvent);
textView.addEventListener('copy', handleEvent);
textView.addEventListener('cut', handleEvent);



function handleEvent(event) {
    console.log(event);
}
