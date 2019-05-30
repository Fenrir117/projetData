// Variable 

form = document.querySelector('form');



form.addEventListener('submit', function(){
    elements = form.elements; // selection de tout les éléments du formulaire est dedans, meme le bouton
    
    for(let item of elements) {
        if ( !item.validity.valid) {
            item.classList.add('error');
            spanMsg = document.querySelector('label[for="'+item.getAttribute('id')+'"] span.msg-error');
            spanMsg.classList.add('msg-error--show');
            event.preventDefault();
        }
    }
});


    elements = form.elements; // selection de tout les éléments du formulaire est dedans, meme le bouton
    
    for(let item of elements) {

        item.addEventListener('blur', function() {

            this.classList.remove('error');
            spanMsg = document.querySelector('label[for="'+this.getAttribute('id')+'"] span.msg-error');
            spanMsg.classList.remove('msg-error--show');    

        if ( !this.validity.valid) {
            this.classList.add('error');
            spanMsg.classList.add('msg-error--show');
        }
    });
}

