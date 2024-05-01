<?php
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
$db = getDatabaseConnection();
$search_term = $_GET['search'];

$stmt = $db->prepare("SELECT item_name from Item where item_name like ?");
$stmt->execute(array("%$search_term%"));

$results = $stmt->fetchAll();


echo display_results($results);
?>