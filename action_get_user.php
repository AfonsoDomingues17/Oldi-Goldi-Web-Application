<?php
require_once('database/connection.php');

$username = $_SESSION['username'];

function getUserByUsername($db, $username) {
    $stmt = $db->prepare('SELECT * FROM Users WHERE username = ?');
    $stmt->execute(array($username));
    return $stmt->fetch();
}

?>