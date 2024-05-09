
const FI = document.getElementById('fileInput');
if(FI){
    FI.addEventListener('change', function(event){
        const photo = event.target.files[0]; //slect the files uploaded
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('profilePicture').src = event.target.result;
            document.getElementById('hidden_input').value = event.target.result;
            
        };

        if (photo) {
            reader.readAsDataURL(photo);
        } 
        
    });
}

const FI2 = document.getElementById('item_img');

if(FI2){

    FI2.addEventListener('change', function(event){
        const photo = event.target.files[0]; //slect the files uploaded
        const reader = new FileReader();
        reader.onload = function(event) { //called after the file is completely read
            const img_wrapper = document.createElement('div');
            const i = document.createElement('i');
            i.className = 'fa-solid fa-xmark';
            img_wrapper.id = 'img_wrapper';
            const img = document.createElement('img');
            img.src = event.target.result;
            img.width = 200;
            img.height = 200;
            document.getElementById('img_container').appendChild(img_wrapper);
            document.getElementById('img_wrapper').appendChild(img);
            document.getElementById('img_wrapper').appendChild(i);
            document.getElementById('item_hidden_input').value += event.target.result + '&';
            console.log(document.getElementById('item_hidden_input').value);
            console.log(document.getElementById('id_user_item'));
        };
    
        if (photo) {
            reader.readAsDataURL(photo);
        } 
        
    });
}

const deleteImages = document.querySelectorAll('span#delete_image');
console.log(deleteImages);
if(deleteImages){

deleteImages.forEach(function(deleteImage){
    deleteImage.addEventListener('click', function(){
        const imageId = document.getElementById('item_photo').getAttribute('data-photo-id');
        console.log(imageId);
        const itemId = deleteImage.getAttribute('data-item-id');
        console.log(itemId);
        fetch('action_delete_image.php?photo_id=' + imageId + '&item_id=' + encodeURIComponent(itemId))
        .then(response => response.text())
        .then(html => {
            document.getElementById('img_container').innerHTML = html;
        });
    });
});
}

/*
const deleteImage = document.querySelectorAll('div#img_wrapper i');
console.log(deleteImage);
if(deleteImage){
    deleteImage.forEach(function(deleteImage){
        deleteImage.addEventListener('click', function(event){
            console.log('clicked');
            const img = event.target.previousElementSibling.src;
            event.target.parentElement.remove();    
            let itemValue = document.getElementById('item_hidden_input').value;
            itemValue = itemValue.replace(img + '&', '');
            document.getElementById('item_hidden_input').value = itemValue;
        });


});

}

*/