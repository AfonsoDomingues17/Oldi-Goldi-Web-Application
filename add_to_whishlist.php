<?php 
session_start();
require_once('database/connection.php');
require_once('is_on_whishlist.php');
$db = getDatabaseConnection();
$itemID = $_GET['item_id'];
$username = $_SESSION['username'];
toggleWhishlist($db, $itemID, $username);
echo isOnwhishlist($db,$itemID,$username) ? 'fa-solid fa-heart' : 'fa-regular fa-heart';

?>