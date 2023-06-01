const customSelects = document.querySelectorAll("select");
for (let i = 0; i < customSelects.length; i++) {
    customSelects[i].addEventListener('addItem', function (event) {
        if (event.detail.value) {
            let parent = this.parentNode.parentNode
            parent.classList.add('valid')
            parent.classList.remove('invalid')
        }
        else {
            let parent = this.parentNode.parentNode
            parent.classList.add('invalid')
            parent.classList.remove('valid')
        }
    }, false);
}
