<?php 

session_start();
require_once('database/connection.php');
require_once('database/users.php');
$db = getDatabaseConnection();
$Cpass = $_POST['cpassword'];
$Npass = $_POST['npassword'];
$CNpass = $_POST['cnpassword'];


if(verify_UserPassword($db,$_SESSION['username'],$Cpass)){
    
    if($Npass == $CNpass){
        echo "true";
    }
    else echo "erro2";

}
else{
    echo "erro1";
}




?>