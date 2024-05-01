<?php

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

function verify_UserPassword($db,$username,$password) : bool{
    $stmt = $db->prepare("SELECT password from Users where username = ?");
    $stmt->execute(array($username));
    $result = $stmt->fetch();
    $current_pass = $result['password'];
    $password = sha1($password);
    if($current_pass == $password) return true;
    else return false;
}

function verify_UsernameExists($db,$username) : bool{
    $stmt = $db->prepare("SELECT count(*) from Users where username = ?");
    $stmt->execute(array($username));
    $result = $stmt->fetchColumn();
    if($result > 0) return true;
    else return false;
}

function verify_EmailExists($db,$email) : bool{
    $stmt = $db->prepare("SELECT count(*) from Users where email = ?");
    $stmt->execute(array($email));
    $result = $stmt->fetchColumn();
    if($result > 0) return true;
    else return false;
}


?>