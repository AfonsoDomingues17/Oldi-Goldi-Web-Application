<?php
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
$db = getDatabaseConnection();
$input = $_POST['inputbar'];
$category = $_POST['Categories'];

$cat_id = getCategorieByName($db,$category);


if($input != ""){
    $encodedInput = urldecode($input);
    if($category != 'All') header('Location: items.php?input=' . $encodedInput . '&' . 'category_id=' . $cat_id);
    else header('Location: items.php?input=' . $encodedInput);
}
else header('Location: index.php');


?>