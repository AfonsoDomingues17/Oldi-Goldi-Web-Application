<?php 
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
require_once('database/chats.php');
$db = getDatabaseConnection();

$cardNumber = $_GET['cardNumber'];
$cardName = $_GET['cardName'];
$cardExpDate = $_GET['expDate'];
$cardCVV = $_GET['cvv'];

addNewCard($db,$cardNumber, $cardName, $cardExpDate, $cardCVV);

echo "<input type=\"radio\" id=\"{$db->lastInsertId()}\" name=\"card\" value=\"{$db->lastInsertId()}\">
<label for=\"card{$db->lastInsertId()}\">";

if($cardNumber[0] == '2' || $cardNumber[0] == '5'){
    echo "<span>Mastercard</span>";
} else if($cardNumber[0] == '4'){
    echo "<span>Visa</span>";
} else if($cardNumber[0] == '3'){
    echo "<span>American Express</span>";
}

echo "<span>**** **** **** " . substr($cardNumber, -4) . "</span>
<span>{$cardExpDate}</span>
<span>{$cardName}</span>
</label>";
?>