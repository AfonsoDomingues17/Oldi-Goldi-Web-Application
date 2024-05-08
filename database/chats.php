<?php     
require_once('database/categories.php');
function getAllChats($db,$username){
    $stmt = $db->prepare("SELECT * FROM chats where buyer = ? or seller = ?");
    $stmt->execute(array($username,$username));
    return $stmt->fetchAll();
}


function addNewChat($db,$buyer,$seller,$item_id){
    $stmt = $db->prepare("INSERT INTO chats (seller,buyer,item_id) VALUES (?,?,?)");
    $stmt->execute(array($seller,$buyer,$item_id));
}

function addMessage($db, $chat_id, $sender_id, $message){
    $stmt = $db->prepare("INSERT INTO messages (chat_id, sender_id, message, timestamp) VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->execute(array($chat_id, $sender_id, $message));
}

function getLastMessage($db,$chat_id){
    $stmt = $db->prepare("SELECT * FROM messages where chat_id = ? ORDER BY timestamp DESC LIMIT 1");
    $stmt->execute(array($chat_id));
    return $stmt->fetch();
}

function getChat($db,$chat_id){
    $stmt = $db->prepare("SELECT * FROM chats where chat_id = ?");
    $stmt->execute(array($chat_id));
    return $stmt->fetch();
}

function getAllMessages($db,$chat_id){
    $stmt = $db->prepare("SELECT * FROM messages where chat_id = ?");
    $stmt->execute(array($chat_id));
    return $stmt->fetchAll();
}

function displayMessages($messages,$db){ 

    
foreach($messages as $message){
                $sender = getUser($db,$message['sender_id']);
                $chat = getChat($db,$message['chat_id']);
                $item = getItem($db,$chat['item_id']);
                if($message['is_price_proposal'] && $_SESSION['username'] == $chat['seller']){?>
                     <li><?= $sender['name']?>: <?= $message['message']?> --> <?= $message['price_proposal']?>€ - OldPrice:<?= $item['price'] ?>€</li>
                     <button>Accept</button>
                     <button id="Reject_Btn" data-message-id="<?= $message['message_id']?>">Reject</button>

                <?php } else if($message['is_price_proposal']){?>
                    <li><?= $sender['name']?>: <?= $message['message']?> --> <?= $message['price_proposal']?>€ - OldPrice:<?= $item['price'] ?>€</li>
                <?php } else {?>
            <li><?= $sender['name']?>: <?= $message['message']?></li>
            <?php } ?>
            <?php } ?>
        
        

<?php }

function addNewPriceMessage($db,$chat_id,$sender_id,$new_price){
    $stmt = $db->prepare("INSERT INTO messages (chat_id, sender_id, message, timestamp,is_price_proposal,price_proposal) VALUES (?, ?, ?, CURRENT_TIMESTAMP,?,?)");
    $stmt->execute(array($chat_id, $sender_id, "New Price Proposal",1,$new_price));
}
function displayMA($messages,$db,$chat_id){ 

    $item = getChatItem($db,$chat_id);
    $item = getItem($db,$item['item_id']);
    $photos = getPhotos($db,$item['ItemID']);
    $brand = getBrand($db, $item['brand_id']);
    $size = getSize($db, $item['size_id']);
    $condition = getCondition($db, $item['condition_id']); ?>

    <h2>Messages</h2>
        <section id="item_info">
            <img src="<?= $photos[0]['photo_url'] ?>" width="100" height="100" alt="item_photo">
            <span id="item_name"><?= $item['item_name'] ?></span> 
            <span id="item_size"><?= $size['size_value'] ?></span> 
            <span id="item_condition"><?= $condition['condition_value'] ?></span> 
            <span id="item_brand"><?= $brand ?></span> 
            <span id="item_price"><?= $item['price'] ?>€</span>
            <button id="PNPBtn">Propose New Price</button>
            <button>BUY NOW!</button>
    </section>

        <ul id="Message_list">
            <?php $messages = getAllMessages($db,$chat_id);
            foreach($messages as $message){
                $sender = getUser($db,$message['sender_id'])?>
                
            <li><?= $sender['name']?>: <?= $message['message']?></li>
            <?php } ?>
        </ul>
        <form id="message_input_container">
        <input type="text" name="message" id="message_box">
        <input type="hidden" name="chat_id" id="hidden_chat_id" value="<?= $chat_id?>">
        <button id="sendMessage2.0"><i class="fa-solid fa-arrow-right"></i></button>
        </form>

        
        

<?php }

function getLatestChatID($db){
    $stmt = $db->prepare("SELECT chat_id FROM messages ORDER BY timestamp DESC LIMIT 1");
    $stmt->execute();
    return $stmt->fetch();
}

function getChatItem($db,$chat_id){
    $stmt = $db->prepare("SELECT item_id FROM chats where chat_id = ?");
    $stmt->execute(array($chat_id));
    return $stmt->fetch();
}

?>