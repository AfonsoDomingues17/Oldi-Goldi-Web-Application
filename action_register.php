<?php 
session_start();
require_once('database/connection.php');                 // database connection
require_once('database/users.php');
if(newUser($_POST['username'],$_POST['name'],$_POST['email'],$_POST['phonenumber'],$_POST['password'],$_POST['cpassword']) === true){
    header('Location: login.php');
    exit;
}
else{
    //passwords do not match
    
}

header('Location: index.php');        // redirect to the page we came from
?>