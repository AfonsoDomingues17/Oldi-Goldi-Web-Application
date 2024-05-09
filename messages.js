const sendMessage = document.getElementById('sendMessage');
console.log(sendMessage);
if(sendMessage){
    sendMessage.addEventListener('click',function(event) {
    event.preventDefault();
    console.log('clicked');
    const message = document.getElementById('message_box').value;
    const chat_id = document.getElementById('hidden_chat_id').value;
    if(message != ''){
        fetch('action_send_message.php?message=' + encodeURIComponent(message) + '&chat_id=' + encodeURIComponent(chat_id))
        .then(response => response.text())
        .then(data => {
            console.log(data);
            document.getElementById('Message_list').innerHTML += data;
            document.getElementById('message_box').value = '';
            
        });


    }
    });

}

const popUPBtn = document.getElementById('PNPBtn');
console.log(popUPBtn);
if(popUPBtn){
    popUPBtn.addEventListener('click', function(event){
        event.preventDefault();
        document.getElementById('newPrice_PopUp').style.display = 'block';
    })

    window.onclick = function(event) {
        if (event.target == document.getElementById('newPrice_PopUp')) {
            document.getElementById('newPrice_PopUp').style.display = 'none'; 
        }
}

const closeX = document.getElementById('close');
if(closeX){
closeX.addEventListener('click',function(){
    document.getElementById('newPrice_PopUp').style.display = 'none'; 
    });
    
}

}   
document.addEventListener('click', function(event) {
    if (event.target && event.target.id === 'Reject_Btn') {
        const messageId = event.target.getAttribute('data-message-id');
        fetch('reject_accept_proposal.php?message_id=' + encodeURIComponent(messageId) + '&action=reject')
        .then(response => response.text())
        .then(data => {
            console.log(data);
            document.getElementById('Message_list').innerHTML = data;
        });
    }
});

const MpopUPBtn = document.getElementById('MBTn');

if(MpopUPBtn){
    MpopUPBtn.addEventListener('click', function(event){
        event.preventDefault();
        document.getElementById('Message_PopUp').style.display = 'block';
    })

    window.onclick = function(event) {
        if (event.target == document.getElementById('Message_PopUp')) {
            document.getElementById('Message_PopUp').style.display = 'none'; 
        }
}

const closeX = document.getElementById('close');
if(closeX){
closeX.addEventListener('click',function(){
    document.getElementById('Message_PopUp').style.display = 'none'; 
    });
    
}
}


const PIpopUPBtn = document.getElementById('PAPBTn');

if(PIpopUPBtn){
    PIpopUPBtn.addEventListener('click', function(event){
        event.preventDefault();
        document.getElementById('newPriceI_PopUp').style.display = 'block';
    })

    window.onclick = function(event) {
        if (event.target == document.getElementById('newPriceI_PopUp')) {
            document.getElementById('newPriceI_PopUp').style.display = 'none'; 
        }
}

const closeX = document.getElementById('close2');
if(closeX){
closeX.addEventListener('click',function(){
    document.getElementById('newPriceI_PopUp').style.display = 'none'; 
    });
    
}
}