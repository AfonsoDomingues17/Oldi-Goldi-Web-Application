/*
document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});
*/
document.getElementById('fileInput').addEventListener('change', function(event){
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