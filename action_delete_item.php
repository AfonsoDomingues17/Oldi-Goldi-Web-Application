<?php 
require_once('database/connection.php');
require_once('database/categories.php');
session_start();
$db = getDatabaseConnection();
$item_id = $_GET['item_id'];
$stmt = $db->prepare("DELETE FROM Item WHERE ItemID = ?");
$stmt->execute(array($item_id));
$stmt = $db->prepare("DELETE FROM Photos WHERE item_id = ?");
$stmt->execute(array($item_id));
header('Location: profile.php');

?>

