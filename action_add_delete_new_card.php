<?php 
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
require_once('database/chats.php');
$db = getDatabaseConnection();

$card_id = $_GET['card_id'];
$cardNumber = $_GET['cardNumber'];
$cardName = $_GET['cardName'];
$cardExpDate = $_GET['expDate'];
$cardCVV = $_GET['cvv'];
if(isset($card_id)){
    $stmt = $db->prepare('DELETE FROM Cards WHERE card_id = ?');
    $stmt->execute(array($card_id));
    echo "Carddeleted";
}
else{
addNewCard($db,$cardNumber, $cardName, $cardExpDate, $cardCVV);

echo addCard($db,$cardNumber, $cardName, $cardExpDate, $cardCVV);
}


?>