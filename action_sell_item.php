<?php 
require_once('database/connection.php');
require_once('database/categories.php');
session_start();
$db = getDatabaseConnection();
$name = $_POST['item_name'];
$description = isset($_POST['item_description']) ? $_POST['item_description'] : null;
$size = $_POST['Sell_Size'];
$condition = $_POST['Sell_Conditions'];
$brand = $_POST['Sell_Brand'];
$price = $_POST['item_price'];
$category =  $_POST['Sell_Categories'];
$photos_string = $_POST['img_URL'];
$photos_string = rtrim($photos_string, '&'); // Remove the last comma
$photos_array = explode("&",$photos_string);
$item_id = isset($_POST['item_id']) ? $_POST['item_id'] : null;

if($item_id != null){
    if($size != 'Nosize')$size_id = getSizeByName($db,$size);
    else $size_id = null;
    if($brand != "Other")$brand = getBrandByName($db,$brand);
    $condition_id = getConditionByName($db,$condition);
    $category_id = getCategorieByName($db,$category);
    $stmt = $db->prepare("UPDATE Item SET item_name = ?, description = ?, price = ?, size_id = ?, condition_id = ?, category_id = ?, brand_id = ? WHERE ItemID = ?");
    $stmt->execute(array($name,$description,$price,$size_id,$condition_id,$category_id,$brand,$item_id));
    
    foreach($photos_array as $photo){
        if($photo != ""){
        $photo_id = getCurrentPhoto_id($db) + 1;
        $stmt = $db->prepare("INSERT INTO Photos (photo_id,photo_url,item_id) VALUES (?,?,?)");
        $stmt->execute(array($photo_id, $photo, $item_id));
        }
    }
    
} else {

if($size != 'Nosize'){
    $size_id = getSizeByName($db,$size);  

}
else $size_id = null;


if($brand != "Other"){
    $brand_id = getBrandByName($db,$brand);
}

$current_id = getCurrentItem_id($db) + 1;

foreach($photos_array as $photo){
    $photo_id = getCurrentPhoto_id($db) + 1;
    $stmt = $db->prepare("INSERT INTO Photos (photo_id,photo_url,item_id) VALUES (?,?,?)");
    $stmt->execute(array($photo_id,$photo,$current_id));
}
$condition_id = getConditionByName($db,$condition);
$category_id = getCategorieByName($db,$category);
$stmt = $db->prepare("INSERT INTO Item (ItemID, model, item_name, description, price, seller, size_id, condition_id, category_id, brand_id) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->execute(array($current_id,"FFFFF",$name,$description,$price,$_SESSION['username'],$size_id,$condition_id,$category_id,$brand_id));
}
header('Location: profile.php');

?>