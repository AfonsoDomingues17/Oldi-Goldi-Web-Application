const PopUP = document.getElementById('passwordPopUp');

const button = document.getElementById('changePasswordBtn');

const close1 = document.getElementById('close');
const submitBtn = document.getElementById('ConfirmChangesBtn');


if(button){
button.addEventListener('click', function (){
    PopUP.style.display = "block";
    

});

window.onclick = function(event) {
    if (event.target == PopUP) {
      PopUP.style.display = "none";
    }
  }

  if(close1){
    close1.addEventListener('click',function(){
    PopUP.style.display = "none";
    
    });
    }
}


window.onclick = function(event) {
    if (event.target == PopUP) {
      PopUP.style.display = "none";
    }
  }
  
const error = document.getElementById('message_error');

if(submitBtn){
submitBtn.addEventListener('click',function(event){
    event.preventDefault();
    const form = document.getElementById('passwordForm');
    const formData = new FormData(form);
    fetch('check_passwords.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if(data == "true"){
            form.submit();
        }
        else if (data == "erro1"){
            error.innerHTML = "Current password is incorrect!";
        }
        else{
            error.innerHTML = "Passwords do not match!";
        }
    })
});

}