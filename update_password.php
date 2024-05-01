<?php 

session_start();
require_once('database/connection.php');
require_once('database/users.php');
$db = getDatabaseConnection();
$Cpass = $_POST['cpassword'];
$Npass = $_POST['npassword'];
$CNpass = $_POST['cnpassword'];

$Npass = sha1($Npass);
$stmt = $db->prepare("UPDATE Users set password = ? where username = ?");
$stmt->execute(array($Npass,$_SESSION['username']));

header('Location: profile.php'); 
?>