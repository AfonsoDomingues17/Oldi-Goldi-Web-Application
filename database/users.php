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

function newUser($username, $name, $email, $password, $C_password) : bool{
    $password = sha1($password);
    $db = getDatabaseConnection();
    $stmt = $db->prepare("INSERT OR IGNORE INTO Users (username,name,email,password) VALUES (?,?,?,?)");
    $stmt->execute(array($username,$name,$email,$password));
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

function verify_IfPasswordMatch($db,$username,$password){
    $password = sha1($password);
    $stmt = $db->prepare("SELECT password from Users where username = ?");
    $stmt->execute(array($username));
    $result = $stmt->fetchColumn();
    if($result == $password) return true;
    else return false;

}

function ElevateUserToAdmin($db,$username){
    $stmt = $db->prepare("UPDATE Users SET isAdmin = 1 WHERE username = ?");
    $stmt->execute(array($username));
}

function getUserPermissions($db,$username){
    $stmt = $db->prepare("SELECT isAdmin from Users where username = ?");
    $stmt->execute(array($username));
    $result = $stmt->fetchColumn();
    return $result;
}


?>