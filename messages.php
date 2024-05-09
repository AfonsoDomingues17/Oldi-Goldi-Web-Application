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

$chat_id = $_GET['chat_id'];
$chat = getChat($db,$chat_id);
$item = getItem($db,$chat['item_id']);


$photos = getPhotos($db,$item['ItemID']);
$brand = getBrand($db, $item['brand_id']);
$size = getSize($db, $item['size_id']);
$condition = getCondition($db, $item['condition_id']);
$chat = getChat($db,$chat_id);
$item_new_price = getNewPrice($db,$chat['buyer'],$item['ItemID']);

?>



<section id="message_area">
<a href="chats.php">Back To Chats</a>
<h2>Messages</h2>
<section id="item_info">
<a href="item.php?item_id=<?= $item['ItemID'] ?>"><img src="<?= $photos[0]['photo_url'] ?>" width="100" height="100" alt="item_photo"></a>
<span id="item_name"><?= $item['item_name'] ?></span> 
<span id="item_size"><?= $size['size_value'] ?></span> 
<span id="item_condition"><?= $condition['condition_value'] ?></span> 
<span id="item_brand"><?= $brand ?></span> 
<?php if(isset($item_new_price)){ ?>
<span id="item_price"><?= $item_new_price ?>€</span>
<?php } else {?>
<span id="item_price"><?= $item['price'] ?>€</span>
<?php } ?>
<?php if($item['seller'] != $_SESSION['username']){ 
?><button id="PNPBtn">Propose New Price</button>
<button>BUY NOW!</button>
<?php } ?>
</section>



<ul id="Message_list">
<?php $messages = getLimitedMessages($db,$chat_id);
foreach($messages as $message){
$sender = getUser($db,$message['sender_id']);
if($message['is_price_proposal'] && $_SESSION['username'] == $chat['seller'] && strpos($message['message'], 'REJECT') === false && strpos($message['message'], 'ACCEPT') === false){
        if(isset($item_new_price)){ ?>
        <li><?= $sender['name']?>: OldPrice:<?= $item_new_price ?>€ <?= $message['message']?></li>
        <?php } else { ?>
        <li><?= $sender['name']?>: OldPrice:<?= $item['price'] ?>€ <?= $message['message']?></li>
        <?php } ?>
        <form action="reject_accept_proposal.php" method="get">
        <input type="hidden" name="action" value="accept">
        <input type="hidden" name="message_id" value="<?= $message['message_id']?>">
        <button id="Accept_Btn" >Accept</button>
        </form>
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
</ul>

<form action="">
    <input type="text" name="message" id="message_box">
    <input type="hidden" name="chat_id" id="hidden_chat_id" value="<?= $chat_id?>">
    <button type="submit" id="sendMessage"><i class="fa-solid fa-arrow-right"></i></button>
</form>




</section>

<section id="newPrice_PopUp">
<section id="NP_PopUpContent">
<span id="close" class="close">&times;</span>
<h2>Propose New Price</h2>
<form action="action_send_new_price.php" method="post">
<label>New Price:<input type="number" id="new_price" name="new_price"></label>
<input type="hidden" name="chat_id" value="<?= $chat_id?>">
<button type="submit" >Make Proposal</button>
</form>
</section>
</section>

