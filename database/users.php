<?php
require_once("database/connection.php");

function userExists($username, $password) : bool{
    $password = sha1($password);
    $db = getDatabaseConnection();
    $stm = $db->prepare('SELECT count(*) from users where username = ? and password = ?');
    $stm->execute(array($username, $password));
    $result = $stm->fetchColumn();
    if($result > 0) return true;
    else return false;
}

function newUser($username, $name, $email, $phone_number, $password, $C_password) : bool{
    $password = sha1($password);
    $db = getDatabaseConnection();
    $stmt = $db->prepare("INSERT OR IGNORE INTO Users VALUES ('$username','$name','$email','$phone_number','$password',null,null,null,null,null,null,false,false)");
    $stmt->execute();
    return true;
}
?>