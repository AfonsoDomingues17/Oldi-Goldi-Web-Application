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
?>