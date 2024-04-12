<?php
    function getAllCategories($db){
        $stmt = $db->prepare('SELECT * FROM Categories');
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }
?>