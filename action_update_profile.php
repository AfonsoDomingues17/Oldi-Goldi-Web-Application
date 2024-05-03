<?php
session_start();
require_once('database/connection.php');               
require_once('database/users.php'); 

$db = getDatabaseConnection();

$description = $_POST['description'];
$email = $_POST['email'];
$name = $_POST['name'];
$phoneNumber = $_POST['pn'];
$address = $_POST['address'];
$zipCode = $_POST['ZP'];
$country = $_POST['Country'];
$city = $_POST['City'];
$photo_url = $_POST['imgSrc'];

if ($photo_url === "") {
    $query = "UPDATE Users SET description = ?, email = ?, name = ?, phone_number = ?, Adress = ?, Zip_code = ?, Country = ?, Cidade = ? WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->execute(array($description,$email,$name,$phoneNumber,$address,$zipCode,$country,$city, $_SESSION['username']));
} else {
    $query = "UPDATE Users SET description = ?, email = ?, name = ?, phone_number = ?, Adress = ?, Zip_code = ?, Country = ?, Cidade = ?, photo_url = ? WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->execute(array($description,$email,$name,$phoneNumber,$address,$zipCode,$country,$city,$photo_url,$_SESSION['username']));
}

header('Location: profile.php'); 
?>