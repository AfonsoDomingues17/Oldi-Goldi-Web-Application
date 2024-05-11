<?php 
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
require_once('database/chats.php');
$db = getDatabaseConnection();

$category = $_GET['category'];
$brand = $_GET['brand'];
$condition = $_GET['condition'];
$size = $_GET['size'];

if($category != ""){
    $stmt = $db->prepare("INSERT INTO Categories (category_name) VALUES (?)");
    $stmt->execute(array($category));
    echo "<li>" . $category . "</li>";
}

if($brand != ""){
    $stmt = $db->prepare("INSERT INTO Brands (brand_name) VALUES (?)");
    $stmt->execute(array($brand));
    echo "<li>" . $brand . "</li>";
}

if($condition != ""){
    $stmt = $db->prepare("INSERT INTO Conditions (condition_value) VALUES (?)");
    $stmt->execute(array($condition));
    echo "<li>" . $condition . "</li>";
}

if($size != ""){
    $stmt = $db->prepare("INSERT INTO Sizes (size_value) VALUES (?)");
    $stmt->execute(array($size));
    echo "<li>" . $size . "</li>";
}
?>