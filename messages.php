<?php 
require_once('database/connection.php');
require_once('database/categories.php');
require_once('templates/common.php');
require_once('templates/display_categories.php');
require_once('database/chats.php');

$db = getDatabaseConnection();
$categories = getAllCategories($db);
$brands = getAllBrands($db);
output_header($db);
display_categories($categories);
$chats = getAllChats($db,$_SESSION['username']);

$item2 = $_GET['item_id'];
$seller = $_GET['seller'];

?>

<section id="message_page">

    <aside id="chats">
        <h2>Chats</h2>
        <ul id="chats">
        <?php foreach($chats as $chat){
            $item3 = getItem($db,$chat['item_id']);
            $message = getLastMessage($db,$chat['chat_id']);
            if($chat['seller'] != $_SESSION['username']){
                $user = getUser($db,$chat['seller']);
            }
            else{
                $user = getUser($db,$chat['buyer']);
            }?>
            <li data-chat-id="<?= $chat['chat_id'] ?>">
                <img src="<?= $user['photo_url'] ?>" width="50" height="50" alt="profile_picture">
                <span id="name"><?= $user['name'] ?></span>
                <span id="item_name">Item:<?= $item3['item_name'] ?></span>
            </li>
          <?php } ?>
        </ul>
    </aside>
    <?php  $chat_id = getLatestChatID($db);
    if(isset($seller) && isset($item2)){
        $item = $item2;
        
        $item = getItem($db,$item);
    } 
    else {
        $item = getChatItem($db,$chat_id['chat_id']);
        $item = getItem($db,$item['item_id']);
    }
    $photos = getPhotos($db,$item['ItemID']);
    $brand = getBrand($db, $item['brand_id']);
    $size = getSize($db, $item['size_id']);
    $condition = getCondition($db, $item['condition_id']);?>

    <section id="message_area">
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

        <?php if(isset($seller) && isset($item2)){
            ?>
            
        <ul id="message_list"></ul>
        <form id="message_input_container" action="action_add_new_chat.php" method="post" >
        <input type="hidden" name="user" value="<?=$seller?>">
        <input type="hidden"  id="hidden_itemID" name="item_id" value="<?=$item2?>">
        <input type="text" id="message_box" name="message">
        <button id="sendMessage"><i class="fa-solid fa-arrow-right"></i></button>
        </form>
        <?php } else { ?>
            <ul id="Message_list">
            <?php $messages = getAllMessages($db,$chat_id['chat_id']);
            foreach($messages as $message){
                $sender = getUser($db,$message['sender_id']);
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
        </ul>
        <form id="message_input_container">
        <input type="text" name="message" id="message_box">
        <input type="hidden" name="chat_id" id="hidden_chat_id" value="<?= $chat_id['chat_id']?>">
        <button id="sendMessage2.0"><i class="fa-solid fa-arrow-right"></i></button>
        </form>

        <?php } ?>
       
    </section>

    <section id="newPrice_PopUp">
        <section id="NP_PopUpContent">
        <span id="close" class="close">&times;</span>
        <h2>Propose New Price</h2>
        <form action="action_send_new_price.php" method="post">
            <label>New Price:<input type="number" id="new_price" name="new_price"></label>
            <input type="hidden" name="chat_id" value="<?= $chat_id['chat_id']?>">
            <button type="submit" >Make Proposal</button>
        </form>
        </section>
    </section>

</section>