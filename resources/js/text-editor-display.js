var isAdvancedUpload = function() {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

let textInput = document.querySelector('.text-input');
let uploadsResultsContainer = $('.upload-results-container');
let textView = document.querySelector('.text-input-display');
let form = document.querySelector('.post-form');


let uploadingDisplay = $('#upload-display');
let textUpload = $('.text-input-display');
const hiddenForm = $('.box.hidden');
const uploadLabel = $('.upload-label');
const inputContainer = $('.input-container.show-placeholder');
// let editorContainer = document.querySelector('.editor');
let ppCount = 1;
let postText = "";
let editorContainer = $('.editor');
let drFiles = false;

if (isAdvancedUpload) {
    textUpload.addClass('has-advanced-upload');
    console.log('Drag n\' drop enabled.');
}


console.log(hiddenForm);

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

// drag dragstart dragend dragover dragenter dragleave drop
/* .on('dragover dragenter', function() {
    $form.addClass('is-dragover');
})
.on('dragleave dragend drop', function() {
    $form.removeClass('is-dragover');
}) */
/*
editorContainer.addEventListener('drag', stopDefaults);
editorContainer.addEventListener('dragstart', stopDefaults);
editorContainer.addEventListener('dragend', stopDefaults);
editorContainer.addEventListener('dragover', stopDefaults);
editorContainer.addEventListener('dragenter', stopDefaults);
editorContainer.addEventListener('dragleave', stopDefaults);

editorContainer.addEventListener('drop', stopDefaults);
editorContainer.addEventListener('drop', dragStart);

editorContainer.addEventListener('drop', handleFiles);
*/

textUpload.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
    e.preventDefault();
    e.stopPropagation();
})
.on('dragover dragenter', function() {
    textUpload.addClass('is-dragover');
    uploadLabel.addClass('show')

})
.on('dragleave dragend drop', function() {
    textUpload.removeClass('is-dragover');
    uploadLabel.removeClass('show');
})
.on('drop', function(e) { // When drag n drop is supported.
    drFiles = e.originalEvent.dataTransfer.files;
    console.log(drFiles);
    // Trigger submit form.
    hiddenForm.trigger('submit');
});

hiddenForm.on('submit', function(e) {
    uploadingDisplay.addClass('working');
    uploadsResultsContainer.addClass('working');
    console.log('submitting hidden file upload.');
    if (drFiles) {
        $.each(drFiles, function(i, file) {
            let uploader = new ChunkedUploader(file=file, form=hiddenForm);
            uploader.start();
            e.preventDefault();
        });
    }
    e.preventDefault();
});
/*
function handleFiles(event) {
    drFiles = event;
    console.log(drFiles);
}

function dragStart(event) {
    console.log(event);
}

function stopDefaults(event) {
    event.preventDefault();
    event.stopPropagation();
}
*/
function handleEvent(event) {
    console.log(event);
}
