<?php
// get_wishlist_status.php
session_start();
require_once('database/connection.php');
require_once('database/categories.php');

$db = getDatabaseConnection();
$itemID = $_GET['item_id'];
$username = $_SESSION['username'];

function isOnwhishlist2($db, $itemID, $username) : bool{
    $stmt = $db->prepare('SELECT * FROM Whishlists WHERE item_id = ? AND username = ?');
    $stmt->execute(array($itemID, $username));
    $r = $stmt->fetch();

    if($r > 0) return true;
    else return false;
    
}

echo isOnwhishlist2($db, $itemID, $username) ? "true" : "false";
?>