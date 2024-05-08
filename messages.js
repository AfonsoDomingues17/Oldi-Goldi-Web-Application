const sendMessage = document.getElementById('sendMessage2.0');

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
            document.getElementById('Message_list').innerHTML = data;
            document.getElementById('message_box').value = '';
        });


    }
    });

}

const chats = document.querySelectorAll('ul#chats li');

if(chats){

chats.forEach(function(chat){
    chat.addEventListener('click',function(event){
        const chat_id = chat.getAttribute('data-chat-id');
        fetch('action_get_messages.php?chat_id=' + encodeURIComponent(chat_id))
        .then(response => response.text())
        .then(data => {
            document.getElementById('message_area').innerHTML = data;
            const popUPBtn = document.getElementById('PNPBtn');
        if(popUPBtn){
        popUPBtn.addEventListener('click', function(event){
            event.preventDefault();
            document.getElementById('newPrice_PopUp').style.display = 'block';
        });
    }
        });
    });


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
const rejectBtn = document.getElementById('Reject_Btn');
if(rejectBtn){
   

rejectBtn.addEventListener('click', function(event) {
    const messageId = event.target.getAttribute('data-message-id');
    fetch('reject_accept_proposal.php?message_id=' + encodeURIComponent(messageId) + '&action=reject')
    .then(response => response.text())
    .then(data => {
        console.log(data);
        document.getElementById('Message_list').innerHTML = data;
    });
    
});
}