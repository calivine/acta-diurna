const dragList = [];
let dragStartIndex;

function dragStart() {
    dragStartIndex = +this.closest("div.edit-image-container").getAttribute("data-index");

}

function dragEnter() {
    this.classList.add("over");

}

function dragLeave() {
    this.classList.remove("over");

}

function dragOver(e) {
    e.preventDefault(); // dragDrop is not executed otherwise
}

function dragDrop() {
    const dragEndIndex = +this.closest("div.edit-image-container").getAttribute("data-index");
    // swap
    this.classList.remove("over");
    // console.log(this);
    swap(dragStartIndex, dragEndIndex);
    const post = new PostHandler('/swap', 'sort', 'GET');
    post.start();
}

function addListeners() {
    const draggables = document.querySelectorAll(".edit-image-container");
    const dragListItems = document.querySelectorAll(".edit-image-inner-container");


    draggables.forEach((draggable, index) => {
        draggable.setAttribute("data-index", index);
        draggable.addEventListener("dragstart", dragStart);
        dragList.push(draggable);
    });

    dragListItems.forEach((item) => {
        item.addEventListener("dragover", dragOver);
        item.addEventListener("drop", dragDrop);
        item.addEventListener("dragenter", dragEnter);
        item.addEventListener("dragleave", dragLeave);
    });
}

function swap(item1, item2) {

    console.log(dragList[item1].querySelector('div.edit-image-form-container'));
    console.log(dragList[item1].querySelector('form'));
    const form1 = dragList[item1].querySelector('form');
    const form2 = dragList[item2].querySelector('form');

    const img1 = dragList[item1].querySelector('img');
    const img2 = dragList[item2].querySelector('img');
    // console.log(dragList[item1].closest('div.edit-image-img'));
    // console.log(dragList[item1].childNodes);
    console.log(img1, img2);
    let temp = img1.getAttribute('src');
    img1.setAttribute('src', img2.getAttribute('src'));
    img2.setAttribute('src', temp);

    temp = form1.getAttribute('action');
    form1.setAttribute('action', form2.getAttribute('action'));
    form2.setAttribute('action', temp);

    const captionInput1 = dragList[item1].querySelector('div.edit-image-input-container input');
    const captionInput2 = dragList[item2].querySelector('div.edit-image-input-container input');

    console.log(captionInput1, captionInput2);

    let tempInput = captionInput1.getAttribute('value');
    captionInput1.setAttribute('value', captionInput2.getAttribute('value'));
    captionInput2.setAttribute('value', tempInput);

    console.log(captionInput1, captionInput2);


}

document.addEventListener('DOMContentLoaded', function () {

    addListeners()

})
