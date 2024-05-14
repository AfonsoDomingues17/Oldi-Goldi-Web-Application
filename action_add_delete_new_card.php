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

echo "<label><input type=\"radio\" id=\"{$db->lastInsertId()}\" name=\"card\" value=\"{$db->lastInsertId()}\" required>";

if($cardNumber[0] == '2' || $cardNumber[0] == '5'){
    echo "<span>Mastercard</span><br>";
} else if($cardNumber[0] == '4'){
    echo "<span>Visa</span><br>";
} else if($cardNumber[0] == '3'){
    echo "<span>American Express</span><br>";
}

echo "<span>**** **** **** " . substr($cardNumber, -4) . "</span><br>
<span>{$cardExpDate}</span><br>
<span>{$cardName}</span><br>
<span data-card-id=\"{$db->lastInsertId()}\" class=\"delete_card\"><i class=\"fa-solid fa-trash-can\"></i></span>
</label>";
}
?>