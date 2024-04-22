<?php
    function getAllBrands($db){
        $stmt = $db -> prepare('SELECT brand_name FROM Brands');
        $stmt->execute();
        $brands = $stmt->fetchAll();
        return $brands;
    }
    function getAllCategories($db){
        $stmt = $db->prepare('SELECT category_name FROM Categories');
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }
    function getAllItems($db){
        $stmt = $db->prepare('SELECT * FROM Item');
        $stmt->execute();
        $items = $stmt->fetchAll();
        return $items;
    }
    function getBrand($db, $brand_id){
        $stmt = $db->prepare('SELECT brand_name FROM Brands WHERE brand_id = ?');
        $stmt->execute(array($brand_id));
        $brand = $stmt->fetch();
        return $brand;
    }
    function getSize($db,$size_id){
        $stmt = $db->prepare('SELECT size_value FROM Sizes WHERE size_id = ?');
        $stmt->execute(array($size_id));
        $size = $stmt->fetch();
        return $size;
    }
    function getPhotos($db,$item_id){
        $stmt = $db->prepare('SELECT photo_url FROM Photos WHERE item_id = ?');
        $stmt->execute(array($item_id));
        $photos = $stmt->fetchAll();
        return $photos;
    }

    function getItem($db, $item_id) {
        $stmt = $db->prepare("SELECT * FROM Item WHERE ItemID = ?");
        $stmt->execute([$item_id]);
        return $stmt->fetch();
    }
    
    function getCondition($db, $condition_id) {
        $stmt = $db->prepare("SELECT condition_value FROM Conditions WHERE condition_id = ?");
        $stmt->execute([$condition_id]);
        return $stmt->fetch();
    }
    
   
?>