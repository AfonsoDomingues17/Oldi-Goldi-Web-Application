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



?>

<section id="chats_page">

    <aside id="chats">
        <h2>Chats</h2>
        <?php if(count($chats) == 0){ ?>
            <p>You have no chats</p>
        <?php } ?>
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
                <span id="lastest_message"><?= $message['message'] ?></span>
                <span id="time_last_message"><?= $message['timestamp'] ?></span>
                <a href="messages.php?chat_id=<?= $chat['chat_id'] ?>"><i class="fa-solid fa-arrow-right"></i></a>
            </li>
          <?php } ?>
        </ul>
    </aside>

