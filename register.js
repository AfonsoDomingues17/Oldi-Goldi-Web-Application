const reg_button = document.getElementById('reg_button');

reg_button.addEventListener('click',function(event){
    event.preventDefault();
    const merrs = document.getElementById('message_error_register');
    const form = document.getElementById('register_action');

    const formData = new FormData(form);

    fetch('check_register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if(data == "true"){
            form.submit();
        }
        else if (data == "erro1"){
            merrs.innerHTML = "Username already exists!";
        }
        else if(data == "erro2"){
            merrs.innerHTML = "Email already exists!";
        }
        else{
            merrs.innerHTML = "Passwords do not match!";
        }
    })


});