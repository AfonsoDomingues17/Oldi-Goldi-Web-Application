<?php 
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
$db = getDatabaseConnection();
$itemID = $_GET['item_id'];
$username = $_SESSION['username'];

function isOnwhishlist($db, $itemID, $username) : bool{
    $stmt = $db->prepare('SELECT * FROM Whishlists WHERE item_id = ? AND username = ?');
    $stmt->execute(array($itemID, $username));
    $r = $stmt->fetch();

    if($r > 0) return true;
    else return false;
    
}
function addToWhishlist($db, $itemID, $username) : bool{
    $stmt = $db->prepare('INSERT INTO Whishlists (item_id, username) VALUES (? , ?)');
    $stmt->execute(array($itemID, $username));
    return true;
}

function removeFromWhishlist($db, $itemID, $username) : bool{
    $stmt = $db->prepare('DELETE FROM Whishlists WHERE item_id = ? AND username = ?');
    $stmt->execute(array($itemID, $username));
    return true;
}


if(isOnwhishlist($db, $itemID, $username)){
    removeFromWhishlist($db, $itemID, $username);
    echo "true";
}
else{
    addToWhishlist($db, $itemID, $username);
    echo "false";
}

?>