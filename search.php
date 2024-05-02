<?php
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
$db = getDatabaseConnection();
$input = $_POST['inputbar'];

if($input != ""){
    $encodedInput = urldecode($input);
    header('Location: items.php?input=' . $encodedInput);
}
else header('Location: index.php');


?>