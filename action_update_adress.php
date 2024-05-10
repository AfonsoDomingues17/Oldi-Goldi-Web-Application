<?php 
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
require_once('database/chats.php');
$db = getDatabaseConnection();
$item_id = $_POST['item_id'];
$adress = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['Country'];
$zip = $_POST['zip'];
$user = getUser($db, $_SESSION['username']);

$stmt = $db->prepare('UPDATE Users SET Adress = ?, Cidade = ?, Country = ?, Zip_code = ? WHERE username = ?');
$stmt->execute(array($adress, $city, $country, $zip, $_SESSION['username']));


header('Location: checkout.php?item_id='.$item_id);
?>