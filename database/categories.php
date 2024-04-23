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
    function getCategorie($db, $categorie_id) {
        $stmt = $db->prepare("SELECT * FROM Categories WHERE category_id = ?");
        $stmt->execute([$categorie_id]);
        return $stmt->fetch();
    }
    
    function getCondition($db, $condition_id) {
        $stmt = $db->prepare("SELECT condition_value FROM Conditions WHERE condition_id = ?");
        $stmt->execute([$condition_id]);
        return $stmt->fetch();
    }
    function Popular_categories($db){

        $stmt = $db->prepare("SELECT category_id, count(*) as Item_count FROM Item GROUP BY category_id ORDER BY Item_count DESC LIMIT 2");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function get_Items_ByCategory($db, $category_id){
        $stmt = $db->prepare("SELECT * FROM Item where category_id = ? LIMIT 5");
        $stmt->execute([$category_id]);
        return $stmt->fetchAll();
    }

    function getItemsByWhislist($db, $username){
        $stmt = $db->prepare('SELECT item_id FROM Whishlists WHERE username = ?');
        $stmt->execute(array($username));
        $items = $stmt->fetchAll();
        return $items;
    }
    

   
?>