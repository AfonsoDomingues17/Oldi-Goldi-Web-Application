<?php
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
$db = getDatabaseConnection();
$search_term = $_GET['search'];
$select = $_GET['select'];
if($select != 'All'){
    $cat_id = getCategorieByName($db,$select);
    $stmt = $db->prepare("SELECT * from Item where item_name like ? AND category_id = ?");
    $stmt->execute(array("%$search_term%",$cat_id));
    $results = $stmt->fetchAll();
}
else{
$stmt = $db->prepare("SELECT * from Item where item_name like ?");
$stmt->execute(array("%$search_term%"));

$results = $stmt->fetchAll();
}

echo display_results($results);
?>