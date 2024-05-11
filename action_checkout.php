<?php 
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
require_once('database/chats.php');
$db = getDatabaseConnection();
$item_id = $_POST['item_sold_id'];
$buyer = $_SESSION['username'];
$seller = $_POST['seller'];
$card_id = $_POST['card'];

$item = getItem($db, $item_id);

$stmt = $db->prepare("INSERT INTO Transactions (buyer, seller, item_id, total_value,transaction_date,card_id) VALUES (?,?,?,?,CURRENT_TIMESTAMP,?)");
$stmt->execute(array($buyer,$seller,$item_id,$item['price'],$card_id));

$stmt = $db->prepare("UPDATE Item SET is_sold = 1 WHERE ItemID = ?");
$stmt->execute(array($item_id));

header('Location: ShippingForm.php');
?>