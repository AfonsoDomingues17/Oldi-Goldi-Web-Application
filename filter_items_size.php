<?php 
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
$db = getDatabaseConnection();
$size_id = $_GET['size_id'];
$items = getItemsBySize($db, $size_id);



echo display_items($db, $items);

?>