<?php 
require_once('database/connection.php');
require_once('database/categories.php');
session_start();
$db = getDatabaseConnection();
$photo_id = $_GET['photo_id'];
$item_id = $_GET['item_id'];
$stmt = $db->prepare("DELETE FROM Photos WHERE photo_id = ?");
$stmt->execute(array($photo_id));


echo "ok";
?>