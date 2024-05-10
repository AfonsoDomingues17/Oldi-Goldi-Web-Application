
const CABtn = document.getElementById('CABtn');
if(CABtn){
    CABtn.addEventListener('click',function(event){
        event.preventDefault();
        document.getElementById('Adress_PopUp').style.display = 'block';
    });

    window.onclick = function(event) {
        if (event.target == document.getElementById('Adress_PopUp')) {
            document.getElementById('Adress_PopUp').style.display = 'none'; 
        }
    }
}

const closeX = document.getElementById('close');
if(closeX){
closeX.addEventListener('click',function(){
    document.getElementById('Adress_PopUp').style.display = 'none'; 
    });
    
}



/*
const confirmBtn = document.getElementById('PopUp_Adress');
console.log(confirmBtn);
if(confirmBtn){
    confirmBtn.addEventListener('click',function(event){
        event.preventDefault();
         
        fetch("action_update_adress.php?adress="+document.getElementById('addressC').value+"&city="+document.getElementById('cityC').value+"&zip="+document.getElementById('zipC').value+"&Country="+document.getElementById('CountryC').value)
        .then(response => response.text())
        .then(date => {
            console
            document.getElementById('shipping_info').innerHTML = date;
        }

        )
    });
}

*/

const radio = document.getElementById('credit')
console.log(radio);
if(radio){
    radio.addEventListener('change', function(){
        if (radio.checked) {
            console.log('radio checked');
            document.getElementById('creditCardInfo').style.display = 'block';
        } else {
            console.log('radio not checked');
            document.getElementById('creditCardInfo').style.display = 'none';
        }
    });
}

const addCardBtn = document.getElementById('addCardsBtn');
if(addCardBtn){

    addCardBtn.addEventListener('click',function(event){
        event.preventDefault();
        document.getElementById('Card_PopUp').style.display = 'block';
    })
    window.onclick = function(event) {
        if (event.target == document.getElementById('Card_PopUp')) {
            document.getElementById('Card_PopUp').style.display = 'none'; 
        }
    }

}

const closeY = document.getElementById('closeCard');
if(closeY){
closeY.addEventListener('click',function(){
    document.getElementById('Card_PopUp').style.display = 'none'; 
    });
    
}

const confirmBtn = document.getElementById('PopUp_Card');
if(confirmBtn){
    confirmBtn.addEventListener('click',function(event){
        event.preventDefault();
         
        fetch("action_add_new_card.php?cardNumber="+document.getElementById('cardNumber').value+"&expDate="+document.getElementById('cardExpiry').value+"&cvv="+document.getElementById('cardCVV').value +"&cardName="+document.getElementById('cardName').value)
        .then(response => response.text())
        .then(date => {
            console
            document.getElementById('myCards').innerHTML += date;
            document.getElementById('Card_PopUp').style.display = "none";
        }

        )
    });
}