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

function displayMessages($messages,$db,$chat){ 
    
    $item = getChatItem($db,$chat['chat_id']);
    $item_new_price = getNewPrice($db,$chat['buyer'],$item['ItemID']);
        foreach($messages as $message){
        $sender = getUser($db,$message['sender_id']);
        if($message['is_price_proposal'] && $_SESSION['username'] == $chat['seller'] && strpos($message['message'], 'REJECT') === false && strpos($message['message'], 'ACCEPT') === false){                   
        if(isset($item_new_price)){ ?>
        <li><?= $sender['name']?>: OldPrice:<?= $item_new_price ?>€ <?= $message['message']?></li>
        <?php } else { ?>
        <li><?= $sender['name']?>: OldPrice:<?= $item['price'] ?>€ <?= $message['message']?></li>
        <?php } ?>
        <button id="Accept_Btn" data-message-id="<?= $message['message_id']?>">Accept</button>
        <button id="Reject_Btn" data-message-id="<?= $message['message_id']?>">Reject</button>

<?php } else if($message['is_price_proposal']){
    if(isset($item_new_price)){ ?>
        <li><?= $sender['name']?>: OldPrice:<?= $item_new_price ?>€ <?= $message['message']?></li>
        <?php } else { ?>
        <li><?= $sender['name']?>: OldPrice:<?= $item['price'] ?>€ <?= $message['message']?></li>
        <?php } ?>
<?php } else {?>
<li><?= $sender['name']?>: <?= $message['message']?></li>
<?php } ?>
<?php } ?>
        
        

<?php }



function addNewPriceMessage($db,$chat_id,$sender_id,$new_price){
    $stmt = $db->prepare("INSERT INTO messages (chat_id, sender_id, message, timestamp,is_price_proposal,price_proposal) VALUES (?, ?, ?, CURRENT_TIMESTAMP,?,?)");
    $stmt->execute(array($chat_id, $sender_id, "New Price Proposal ->" . $new_price .'€',1,$new_price));
}

function getLimitedMessages($db, $chat_id) {
    $stmt = $db->prepare("SELECT * FROM messages WHERE chat_id = ? ORDER BY timestamp LIMIT 15");
    $stmt->execute([$chat_id]);
    return $stmt->fetchAll();
}

function getLatestChatID($db){
    $stmt = $db->prepare("SELECT chat_id FROM messages where sender_id = ? ORDER BY timestamp DESC LIMIT 1");
    $stmt->execute(array($_SESSION['username']));
    return $stmt->fetch();
}

function getChatItem($db,$chat_id){
    $stmt = $db->prepare("SELECT item_id FROM chats where chat_id = ?");
    $stmt->execute(array($chat_id));
    return $stmt->fetch();
}

function VerifyChatExists($db,$buyer,$seller,$item_id) {
    $stmt = $db->prepare("SELECT chat_id FROM chats where buyer = ? and seller = ? and item_id = ?");
    $stmt->execute(array($buyer,$seller,$item_id));
    return $stmt->fetch();
}

?>