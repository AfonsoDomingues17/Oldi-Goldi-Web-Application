<?php 

session_start();
require_once('database/connection.php');
require_once('database/users.php');
$db = getDatabaseConnection();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$Cpass = $_POST['cpassword'];



if(verify_UsernameExists($db,$username)){
    echo "erro1";
}
else if(verify_EmailExists($db,$email)){
    echo "erro2";
}
else if($password != $Cpass) echo "erro3";

else echo "true";




?>